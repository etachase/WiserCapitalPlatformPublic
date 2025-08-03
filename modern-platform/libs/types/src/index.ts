// User & Authentication Types
export interface User {
  id: number;
  email: string;
  role: UserRole;
  profile: UserProfile;
  company?: Company;
  isActive: boolean;
  createdAt: string;
  updatedAt: string;
}

export interface UserProfile {
  firstName: string;
  lastName: string;
  phone?: string;
  avatar?: string;
  bio?: string;
  timezone?: string;
  preferences?: UserPreferences;
}

export interface UserPreferences {
  theme: 'light' | 'dark' | 'auto';
  language: string;
  notifications: NotificationSettings;
  dashboard: DashboardSettings;
}

export interface NotificationSettings {
  email: boolean;
  push: boolean;
  projectUpdates: boolean;
  systemAlerts: boolean;
  marketingEmails: boolean;
}

export interface DashboardSettings {
  defaultView: 'grid' | 'list' | 'map';
  itemsPerPage: number;
  showOnboarding: boolean;
}

export type UserRole = 
  | 'admin' 
  | 'solar_installer' 
  | 'investor' 
  | 'host_facility' 
  | 'manufacturer' 
  | 'utility_provider';

export interface AuthToken {
  accessToken: string;
  refreshToken: string;
  expiresIn: number;
  tokenType: 'Bearer';
}

// Company Types
export interface Company {
  id: number;
  name: string;
  type: CompanyType;
  website?: string;
  address: Address;
  phone?: string;
  email?: string;
  description?: string;
  logo?: string;
  licenses?: string[];
  certifications?: string[];
  isVerified: boolean;
  createdAt: string;
}

export type CompanyType = 
  | 'solar_installer' 
  | 'investment_firm' 
  | 'host_facility' 
  | 'manufacturer' 
  | 'utility_provider';

// Address Types
export interface Address {
  street: string;
  city: string;
  state: string;
  zipCode: string;
  country: string;
  coordinates?: Coordinates;
}

export interface Coordinates {
  lat: number;
  lng: number;
}

// Asset Types
export interface Asset {
  id: number;
  type: AssetType;
  name: string;
  model: string;
  manufacturer: Manufacturer;
  specifications: AssetSpecifications;
  certifications: string[];
  warranty: WarrantyInfo;
  datasheet?: string;
  images?: string[];
  isActive: boolean;
  createdAt: string;
  updatedAt: string;
}

export type AssetType = 'module' | 'inverter' | 'racking' | 'monitoring' | 'battery';

export interface Manufacturer {
  id: number;
  name: string;
  website?: string;
  country: string;
  logo?: string;
}

export interface AssetSpecifications {
  power?: string;
  efficiency?: string;
  voltage?: string;
  current?: string;
  temperatureCoefficient?: string;
  dimensions?: string;
  weight?: string;
  [key: string]: string | number | undefined;
}

export interface WarrantyInfo {
  product: string;
  performance?: string;
  terms?: string;
}

// Project Types
export interface Project {
  id: number;
  name: string;
  description?: string;
  status: ProjectStatus;
  location: ProjectLocation;
  systemDesign: SystemDesign;
  financial: FinancialInfo;
  wsarScore?: WSARScore;
  stakeholders: ProjectStakeholders;
  documents: ProjectDocument[];
  timeline: ProjectTimeline;
  tags?: string[];
  isPublic: boolean;
  createdAt: string;
  updatedAt: string;
}

export type ProjectStatus = 
  | 'draft' 
  | 'in_development' 
  | 'under_review' 
  | 'approved' 
  | 'in_construction' 
  | 'commissioned' 
  | 'operational' 
  | 'on_hold' 
  | 'cancelled';

export interface ProjectLocation {
  address: Address;
  utilityProvider?: string;
  tariffSchedule?: string;
  solarZone?: number;
  climateData?: ClimateData;
}

export interface ClimateData {
  annualSolarIrradiance: number; // kWh/m²/year
  averageTemperature: number; // °C
  peakSunHours: number;
  weatherStation: string;
}

export interface SystemDesign {
  capacity: string; // e.g., "500kW"
  modules: ComponentInfo;
  inverters: ComponentInfo;
  racking?: string;
  monitoring?: string;
  layout?: SystemLayout;
  estimatedAnnualProduction: number; // kWh
  dcAcRatio?: number;
}

export interface ComponentInfo {
  model: string;
  manufacturer?: string;
  quantity: number;
  totalPower?: string;
  specifications?: AssetSpecifications;
}

export interface SystemLayout {
  totalModules: number;
  strings: number;
  modulesPerString: number;
  inverterGroups: InverterGroup[];
  azimuth: number; // degrees
  tilt: number; // degrees
}

export interface InverterGroup {
  inverter: string;
  stringsConnected: number;
  modules: number;
}

export interface FinancialInfo {
  totalCost: number;
  costPerWatt: number;
  estimatedAnnualSavings: number;
  paybackPeriod: number; // years
  irr: number; // %
  npv: number;
  lcoe: number; // $/kWh
  incentives?: Incentive[];
  financing?: FinancingOption;
}

export interface Incentive {
  type: 'federal_tax_credit' | 'state_rebate' | 'utility_rebate' | 'srec' | 'other';
  name: string;
  amount: number;
  unit: 'dollars' | 'percent' | 'per_watt';
  description?: string;
}

export interface FinancingOption {
  type: 'cash' | 'loan' | 'lease' | 'ppa';
  provider?: string;
  terms?: FinancingTerms;
}

export interface FinancingTerms {
  amount: number;
  interestRate: number;
  termYears: number;
  monthlyPayment?: number;
}

// WSAR (Wiser Solar Asset Rating) Types
export interface WSARScore {
  overall: number; // 0-100
  breakdown: WSARBreakdown;
  calculatedAt: string;
  version: string; // Algorithm version
}

export interface WSARBreakdown {
  siteConditions: WSARCategory;
  systemDesign: WSARCategory;
  financial: WSARCategory;
  regulatory: WSARCategory;
  installer: WSARCategory;
}

export interface WSARCategory {
  score: number; // 0-100
  weight: number; // 0-1
  factors: Record<string, number>;
  notes?: string[];
}

// Project Stakeholders
export interface ProjectStakeholders {
  installer: Stakeholder;
  hostFacility: Stakeholder;
  investor?: Stakeholder;
  developer?: Stakeholder;
}

export interface Stakeholder {
  id: number;
  name: string;
  contact: string;
  role: string;
  company?: string;
  license?: string;
  permissions: StakeholderPermissions;
}

export interface StakeholderPermissions {
  view: boolean;
  edit: boolean;
  approve: boolean;
  download: boolean;
}

// Document Types
export interface ProjectDocument {
  id: number;
  projectId: number;
  name: string;
  type: DocumentType;
  category: DocumentCategory;
  fileUrl: string;
  fileSize: number;
  mimeType: string;
  checksum?: string;
  uploadedBy: number;
  uploadedAt: string;
  isPublic: boolean;
  tags?: string[];
}

export type DocumentType = 'pdf' | 'doc' | 'docx' | 'xls' | 'xlsx' | 'jpg' | 'jpeg' | 'png' | 'dwg' | 'other';

export type DocumentCategory = 
  | 'site_assessment' 
  | 'system_design' 
  | 'financial' 
  | 'permits' 
  | 'contracts' 
  | 'photos' 
  | 'reports' 
  | 'other';

// Timeline Types
export interface ProjectTimeline {
  created: string;
  siteAssessment?: string;
  designComplete?: string;
  permitsSubmitted?: string;
  permitsApproved?: string;
  constructionStart?: string;
  constructionComplete?: string;
  commissioning?: string;
  cod?: string; // Commercial Operation Date
  milestones?: Milestone[];
}

export interface Milestone {
  id: number;
  name: string;
  description?: string;
  dueDate?: string;
  completedDate?: string;
  isCompleted: boolean;
  assignedTo?: number;
}

// Portfolio Types
export interface Portfolio {
  id: number;
  name: string;
  description?: string;
  ownerId: number;
  projects: Project[];
  totalCapacity: number; // kW
  totalValue: number;
  averageWSAR: number;
  performanceMetrics: PerformanceMetrics;
  createdAt: string;
  updatedAt: string;
}

export interface PerformanceMetrics {
  totalProduction: number; // kWh
  expectedProduction: number; // kWh
  performanceRatio: number; // %
  co2Offset: number; // tons
  revenue: number;
  lastUpdated: string;
}

// API Response Types
export interface ApiResponse<T = any> {
  success: boolean;
  data?: T;
  message?: string;
  error?: ApiError;
  pagination?: PaginationInfo;
}

export interface ApiError {
  code: string;
  message: string;
  details?: Record<string, any>;
  stack?: string;
}

export interface PaginationInfo {
  page: number;
  limit: number;
  total: number;
  totalPages: number;
  hasNext: boolean;
  hasPrevious: boolean;
}

// Filter and Sort Types
export interface QueryFilters {
  search?: string;
  status?: string[];
  location?: string;
  capacity?: { min?: number; max?: number };
  wsarScore?: { min?: number; max?: number };
  dateRange?: { start: string; end: string };
  tags?: string[];
}

export interface QuerySort {
  field: string;
  direction: 'asc' | 'desc';
}

export interface QueryOptions {
  page?: number;
  limit?: number;
  filters?: QueryFilters;
  sort?: QuerySort;
  include?: string[];
}

// Form Validation Types
export interface ValidationError {
  field: string;
  message: string;
  code: string;
}

export interface FormErrors {
  [key: string]: string | string[];
}

// Utility Types
export type Omit<T, K extends keyof T> = Pick<T, Exclude<keyof T, K>>;
export type Partial<T> = { [P in keyof T]?: T[P] };
export type Required<T> = { [P in keyof T]-?: T[P] };

// Create and Update Types
export type CreateUser = Omit<User, 'id' | 'createdAt' | 'updatedAt'>;
export type UpdateUser = Partial<Omit<User, 'id' | 'createdAt' | 'updatedAt'>>;

export type CreateProject = Omit<Project, 'id' | 'createdAt' | 'updatedAt'>;
export type UpdateProject = Partial<Omit<Project, 'id' | 'createdAt' | 'updatedAt'>>;

export type CreateAsset = Omit<Asset, 'id' | 'createdAt' | 'updatedAt'>;
export type UpdateAsset = Partial<Omit<Asset, 'id' | 'createdAt' | 'updatedAt'>>;