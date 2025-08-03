var gMap, gAutocomplete, gShapes, gMarkers, gEditShape, gCutShape;

$(function () {

    gShapes = [];
    gMarkers = [];

    gMap = new google.maps.Map(document.getElementById('gMap'), {
        center: new google.maps.LatLng(37.09024, -95.712891),
        zoom: 4,
        maxZoom: 22,
        mapTypeId: google.maps.MapTypeId.SATELLITE,
        rotateControl: false,
        streetViewControl: false,
        zoomControlOptions: {
            position: google.maps.ControlPosition.LEFT_BOTTOM
        }
    });

    gMap.setTilt(0); // turns off angled view



    gAutocomplete = new google.maps.places.Autocomplete(document.getElementById('txtSearch'), {types: ['address']});
    gAutocomplete.addListener('place_changed', function () {
        //var placeDetails;

        var place = gAutocomplete.getPlace();

        if (place) {
            var $place = $("<div>" + place.adr_address + "</div>");
            $("#txtAddress").val($place.find("span.street-address").text());
            $("#txtLocality").val($place.find("span.locality").text());
            $("#txtRegion").val($place.find("span.region").text());
            $("#txtCountry").val($place.find("span.country-name").text());
            $("#txtPostCode").val($place.find("span.postal-code").text());
            $('.txtPostCode').hide();
            $('.utility_provider_row').show();
            if (!$('#txtPostCode').val()) {
                $('.utility_provider_row').hide();
                $('.txtPostCode').show();
            }
            utilityProviderSelect([], $("#txtPostCode").val());
            $('#toolbar').toggleClass('show');
            $('#map-form .fa-question-circle').tooltip({placement: 'top', trigger: 'manual'}).tooltip('hide');
            
        }

        fillRenewableIncentiveField(place.formatted_address, null);
        
        gMap.panTo(place.geometry.location);
        gMap.setZoom(22);

        gMarkers.push(addMapPin(place.geometry.location));
    });

    gMap.addListener('click', function (event) {

        var selTool = getTool();

        switch (selTool)
        {
            case "add":
                if (gEditShape == null) {

                    //Create a new Shape
                    gEditShape = {
                        markers: [[]],
                        type: "polygon",
                        poly: addPolygon()
                    };

                    gEditShape.poly.setMap(gMap);
                }

                var marker = createMarker(event.latLng);
                gEditShape.markers[0].push(marker);
                redrawShape(gEditShape);
                break;
            case "rectangle":
                if (gEditShape == null) {

                    //Create a new Shape
                    gEditShape = {
                        markers: [[]],
                        type: "rectangle",
                        poly: addPolygon()
                    };

                    gEditShape.poly.setMap(gMap);

                    var marker = createMarker(event.latLng);
                    gEditShape.markers[0].push(marker);
                    redrawShape(gEditShape);

                } else {
                    //Create the remaining three points of the rectangle, based on where the mouse ends up
                    var anchor = gEditShape.markers[0][0].getPosition();
                    gEditShape.markers[0].push(createMarker({lat: anchor.lat(), lng: event.latLng.lng()}));
                    gEditShape.markers[0].push(createMarker({lat: event.latLng.lat(), lng: event.latLng.lng()}));
                    gEditShape.markers[0].push(createMarker({lat: event.latLng.lat(), lng: anchor.lng()}));
                    closeShape();
                }

                break;
            case "cut":
                if (gCutShape == null) {

                    gCutShape = getShapeByPolyLocation(event.latLng);
                    if (gCutShape == null) {
                        alert("Please click on an internal area of an exisiting shape to cut");
                        return;
                    }

                    var cutPath = [];
                    cutPath.push(createMarker(event.latLng));
                    gCutShape.markers.push(cutPath);
                    redrawShape(gCutShape);

                } else {

                    var polyToCut = getShapeByPolyLocation(event.latLng);

                    if (polyToCut != null && polyToCut == gCutShape) {
                        var cutMarker = createMarker(event.latLng);
                        gCutShape.markers[gCutShape.markers.length - 1].push(cutMarker);
                        redrawShape(gCutShape);
                    }
                }
                break;
            case "pin":
                console.log(event.latLng);
                gMarkers.push(addMapPin(event.latLng));
                break;
            case "edit":
                break;
            case "delete":
                var selectedShape = getShapeByPolyLocation(event.latLng);
                if (selectedShape != null) {
                    if (confirm("Are you sure you want to delete this panel?") == true) {
                        removeShape(selectedShape);
                    }
                }
        }


    });

    gMap.addListener("mousemove", function (event) {

        var selTool = getTool();
        if (selTool == "add" || selTool == "rectangle" || selTool == "cut") {
            gMap.setOptions({draggableCursor: "crosshair"});
        } else if (selTool == "delete" || selTool == "pin") {
            gMap.setOptions({draggableCursor: "pointer"});
        } else {
            gMap.setOptions({draggableCursor: ""});
        }

        if (gEditShape != null) {
            if (gEditShape.type == "rectangle") {
                var path = [];

                if (gEditShape.markers[0].length > 0) {
                    var anchor = gEditShape.markers[0][0].getPosition();
                    path.push(anchor);
                    path.push({lat: anchor.lat(), lng: event.latLng.lng()});
                    path.push(event.latLng);
                    path.push({lat: event.latLng.lat(), lng: anchor.lng()});
                }

                gEditShape.poly.setPath(path);

            } else {
                redrawShape(gEditShape, event.latLng);
            }
        }
        if (gCutShape != null) {
            redrawShape(gCutShape, event.latLng);
        }
    });


    //Invoked when the toolbar tool is changed
    $("input[name='toolbar']").click(function () {
        $(this).parent().siblings().removeClass('active');
        $(this).parent().addClass('active');
        var selTool = getTool();

        if (gEditShape != null) {
            removeShape(gEditShape);
            gEditShape = null;
        }

        if (gCutShape != null) {
            gCutShape = null;
        }

        if (selTool == "edit") {
            for (var i = 0; i < gShapes.length; i++) {
                markersSetVisible(gShapes[i], true);
            }
        } else {
            for (var i = 0; i < gShapes.length; i++) {
                markersSetVisible(gShapes[i], false);
            }
        }

    });

});

var addMapPin = function (location) {
    var marker = new google.maps.Marker({
        position: location,
        draggable: true,
        map: gMap
    });

    marker.addListener('click', function () {
        var selTool = getTool();

        if (selTool == "delete") {
            if (confirm("Are you sure you want to delete this pin?") == true) {
                marker.setMap(null);
                var index = gMarkers.indexOf(marker);
                if (index > -1) {
                    gMarkers.splice(index, 1);
                }

            }
        }
    });


    //google.maps.event.addListener(marker, 'dragend', function (event) {
    //    console.log(event);
    //    gMap.panTo(event.latLng);
    //});

    return marker;
}

var addPolygon = function () {
    return new google.maps.Polygon({
        strokeColor: '#E69508',
        strokeOpacity: 0.9,
        strokeWeight: 1,
        fillColor: '#9C6B97',
        fillOpacity: 0.5,
        clickable: false
    });
}

var calculateAreaForShape = function (shape) {

    var area = 0;

    var paths = getPathsForShape(shape)
    for (k = 0; k < paths.length; k++) {
        if (k == 0) {
            area += google.maps.geometry.spherical.computeArea(paths[k]);
        } else {
            area -= google.maps.geometry.spherical.computeArea(paths[k]);
        }
    }

    return area;
}


var calculateArea = function () {
    var area = 0;
    for (var i = 0; i < gShapes.length; i++) {
        var paths = getPathsForShape(gShapes[i])
        for (k = 0; k < paths.length; k++) {
            if (k == 0) {
                area += google.maps.geometry.spherical.computeArea(paths[k]);
            } else {
                area -= google.maps.geometry.spherical.computeArea(paths[k]);
            }
        }
    }

    $("#spnTotalArea").html(Math.round(area * 10.764));
}

var clearMap = function () {

    for (var i = 0; i < gMarkers.length; i++) {
        gMarkers[i].setMap(null);
    }

    gMarkers = [];

    for (var i = 0; i < gShapes.length; i++) {
        gShapes[i].poly.setMap(null);

        for (var j = 0; j < gShapes[i].markers.length; j++) {
            for (var k = 0; k < gShapes[i].markers[j].length; k++) {
                gShapes[i].markers[j][k].setMap(null);
            }
        }
    }

    gShapes = [];
}

var closeShape = function () {
    if (gEditShape != null) {
        //Add the Shape to the shapes collection
        gShapes.push(gEditShape);
        markersSetVisible(gEditShape, false);
        gEditShape = null;
    } else if (gCutShape != null) {
        markersSetVisible(gCutShape, false);
        gCutShape = null;
    }

    redrawAllShapes();
}

var createMarker = function (latlng)
{
    // Add a new marker at the new plotted point on the polyline.
    var marker = new google.maps.Marker({
        position: latlng,
        icon: {
            path: google.maps.SymbolPath.CIRCLE,
            scale: 5,
            strokeColor: '#333',
            strokeOpacity: 0.8
        },
        //title: '#' + path.getLength(),
        map: gMap,
        draggable: true,
    });

    google.maps.event.addListener(marker, 'dragend', function (event) {
        redrawAllShapes();
    });

    google.maps.event.addListener(marker, 'dblclick', function (event) {
        closeShape();
    });

    return marker;
}

var createScreenshot = function (handler) {


    var transform = $(".gm-style>div:first>div").css("transform")
    var comp = transform.split(",") //split up the transform matrix
    var mapleft = parseFloat(comp[4]) //get left value
    var maptop = parseFloat(comp[5])  //get top value
    $(".gm-style>div:first>div").css({//get the map container. not sure if stable
        "transform": "none",
        "left": mapleft,
        "top": maptop,
    })



    html2canvas($("#gMap"), {
        useCORS: true,
        onrendered: function (canvas) {
            var dataUrl = canvas.toDataURL("image/png");
            $('#screenshot').val(dataUrl);

            $(".gm-style>div:first>div").css({
                left: 0,
                top: 0,
                "transform": transform
            })


            handler();
            //window.open(dataUrl, '_blank');

            //$.ajax({
            //    url: 'save_image.php',
            //    type: 'POST',
            //    data: {
            //        data: dataUrl
            //    },
            //    success: function (result) {
            //        var obj = JSON.parse(result);
            //        console.log(obj);
            //        if (obj[0].search("success") != -1) {
            //            document.location.href = "read_screenshot.php";
            //        }
            //        else {

            //            alert(obj[1]);
            //        }
            //    }
            //});
        }
    });
}

var getTool = function () {
    return $("input[name='toolbar']:checked").val();
}

var loadMap = function (json) {

    if (gMap != null) {

        $("input:radio[name=toolbar]").val(["move"]);
        clearMap();

        var loadObj = JSON.parse(json);

        //console.log(new google.maps.LatLng(loadObj.center.lat, loadObj.center.lng));
        //gMarker.setPosition(loadObj.center);
        gMap.panTo(loadObj.center);
        gMap.setZoom(loadObj.zoom);

        $("#txtAddress").val(loadObj.place.address);
        $("#txtLocality").val(loadObj.place.locality);
        $("#txtRegion").val(loadObj.place.region);
        $("#txtCountry").val(loadObj.place.country);
        $("#txtPostCode").val(loadObj.place.postcode);

        gMarkers = [];

        for (var i = 0; i < loadObj.pins.length; i++) {
            gMarkers.push(addMapPin(loadObj.pins[i]));
        }

        gShapes = [];

        for (var i = 0; i < loadObj.shapes.length; i++) {

            //Create a new Shape
            var loadShape = {
                markers: [],
                poly: addPolygon()
            };

            loadShape.poly.setMap(gMap);

            for (var j = 0; j < loadObj.shapes[i].paths.length; j++) {
                var loadPath = [];
                for (var k = 0; k < loadObj.shapes[i].paths[j].length; k++) {
                    var loadMarker = createMarker(loadObj.shapes[i].paths[j][k]);
                    loadMarker.setVisible(false);
                    loadPath.push(loadMarker);
                }
                loadShape.markers.push(loadPath);
            }

            gShapes.push(loadShape);

        }

        redrawAllShapes();
    }


};

var markersSetVisible = function (shape, visible) {
    for (var j = 0; j < shape.markers.length; j++) {
        for (var i = 0; i < shape.markers[j].length; i++) {
            shape.markers[j][i].setVisible(visible);
        }
    }
}


var getPathsForShape = function (shape) {
    var paths = [];

    for (var j = 0; j < shape.markers.length; j++) {
        var path = [];

        for (var i = 0; i < shape.markers[j].length; i++) {
            path.push(shape.markers[j][i].getPosition());
        }

        if (j == 0) {
            if (google.maps.geometry.spherical.computeSignedArea(path) < 0) {
                path.reverse();
            }
        } else {

            if (google.maps.geometry.spherical.computeSignedArea(path) >= 0) {
                path.reverse();
            }
        }

        paths.push(path);
    }

    return paths;
}

var getShapeByPolyLocation = function (pos) {

    for (var i = 0; i < gShapes.length; i++) {
        if (google.maps.geometry.poly.containsLocation(pos, gShapes[i].poly)) {
            return gShapes[i];
        }
    }

    return null;
}


var redrawAllShapes = function () {
    for (var i = 0; i < gShapes.length; i++) {
        redrawShape(gShapes[i]);
    }

    calculateArea();
}

var redrawShape = function (shape, mouseLoc) {
    var paths = getPathsForShape(shape);

    if (mouseLoc) {
        paths[paths.length - 1].push(mouseLoc);
    }

    shape.poly.setPaths(paths);
}

var removeShape = function (shape) {
    //Remove the markers and the poly for the cutout.
    if (shape.markers != null) {
        for (var j = 0; j < shape.markers.length; j++) {
            for (var i = 0; i < shape.markers[j].length; i++) {
                shape.markers[j][i].setMap(null);
            }
        }
    }
    shape.poly.setMap(null);

    var index = gShapes.indexOf(shape);
    if (index > -1) {
        gShapes.splice(index, 1);
    }

    calculateArea();
}

var saveMap = function () {

    var saveObj = {
        place: {
            address: $("#txtAddress").val(),
            locality: $("#txtLocality").val(),
            region: $("#txtRegion").val(),
            country: $("#txtCountry").val(),
            postcode: $("#txtPostCode").val()
        },
        center: gMap.getCenter(),
        zoom: gMap.getZoom(),
        totalArea: 0,
        pins: [],
        shapes: []
    };

    for (var i = 0; i < gMarkers.length; i++) {
        saveObj.pins.push(gMarkers[i].getPosition());
    }

    for (var i = 0; i < gShapes.length; i++) {
        var shapeArea = calculateAreaForShape(gShapes[i]);
        saveObj.totalArea += shapeArea;

        var shape = {
            index: i,
            area: shapeArea,
            paths: []
        };

        for (var j = 0; j < gShapes[i].markers.length; j++) {
            var path = [];
            for (var k = 0; k < gShapes[i].markers[j].length; k++) {
                path.push(gShapes[i].markers[j][k].getPosition());
            }
            shape.paths.push(path);
        }
        saveObj.shapes.push(shape);
    }

    return JSON.stringify(saveObj);

};

