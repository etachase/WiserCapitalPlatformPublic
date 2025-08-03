<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use DOMDocument;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('file_green_button', function($attribute, $value, $parameters, $validator) {
            $xmlContent = file_get_contents($value->getRealPath());
            $csv_mimetypes = array(
                'text/csv',
                'text/plain',
                'application/csv',
                'text/comma-separated-values',
                'application/excel',
                'application/vnd.ms-excel',
                'application/vnd.msexcel',
                'text/anytext',
                'application/octet-stream',
                'application/txt',
            );
            return ($this->isXMLContentValid($xmlContent, '1.0', 'utf-8') || in_array($value->getClientMimeType(), $csv_mimetypes));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('s3helper', function()
        {
            return new \App\Support\S3Helper;
        });
        // Manually registering provider only if the environment is set to
        // development. That prevents a loading failure in PROD when the
        // package is not present.
        if ($this->app->environment('development')) {
//            $this->app->register('JeroenG\Packager\PackagerServiceProvider');
            $this->app->register('Libern\SqlLogging\SqlLoggingServiceProvider');
        }
    }
    /**
     * @param string $xmlContent A well-formed XML string
     * @param string $version 1.0
     * @param string $encoding utf-8
     * @return bool
     */
    public function isXMLContentValid($xmlContent, $version = '1.0', $encoding = 'utf-8')
    {
        if (trim($xmlContent) == '') {
            return false;
        }

        libxml_use_internal_errors(true);

        $doc = new DOMDocument($version, $encoding);
        $doc->loadXML($xmlContent);

        $errors = libxml_get_errors();
        libxml_clear_errors();

        return empty($errors);
    }
}
