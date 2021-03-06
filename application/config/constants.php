<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
  |--------------------------------------------------------------------------
  | File and Directory Modes
  |--------------------------------------------------------------------------
  |
  | These prefs are used when checking and setting modes when working
  | with the file system.  The defaults are fine on servers with proper
  | security, but you may wish (or even need) to change the values in
  | certain environments (Apache running a separate process for each
  | user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
  | always be used to set the mode correctly.
  |
 */
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0755);

/*
  |--------------------------------------------------------------------------
  | File Stream Modes
  |--------------------------------------------------------------------------
  |
  | These modes are used when working with fopen()/popen()
  |
 */

define('FOPEN_READ', 'rb');
define('FOPEN_READ_WRITE', 'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE', 'ab');
define('FOPEN_READ_WRITE_CREATE', 'a+b');
define('FOPEN_WRITE_CREATE_STRICT', 'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
  |--------------------------------------------------------------------------
  | Display Debug backtrace
  |--------------------------------------------------------------------------
  |
  | If set to TRUE, a backtrace will be displayed along with php errors. If
  | error_reporting is disabled, the backtrace will not display, regardless
  | of this setting
  |
 */
define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
  |--------------------------------------------------------------------------
  | Exit Status Codes
  |--------------------------------------------------------------------------
  |
  | Used to indicate the conditions under which the script is exit()ing.
  | While there is no universal standard for error codes, there are some
  | broad conventions.  Three such conventions are mentioned below, for
  | those who wish to make use of them.  The CodeIgniter defaults were
  | chosen for the least overlap with these conventions, while still
  | leaving room for others to be defined in future versions and user
  | applications.
  |
  | The three main conventions used for determining exit status codes
  | are as follows:
  |
  |    Standard C/C++ Library (stdlibc):
  |       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
  |       (This link also contains other GNU-specific conventions)
  |    BSD sysexits.h:
  |       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
  |    Bash scripting:
  |       http://tldp.org/LDP/abs/html/exitcodes.html
  |
 */
define('EXIT_SUCCESS', 0); // no errors
define('EXIT_ERROR', 1); // generic error
define('EXIT_CONFIG', 3); // configuration error
define('EXIT_UNKNOWN_FILE', 4); // file not found
define('EXIT_UNKNOWN_CLASS', 5); // unknown class
define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
define('EXIT_USER_INPUT', 7); // invalid user input
define('EXIT_DATABASE', 8); // database error
define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code


/**
 * Tables
 */
define('TBL_USERS', 'tbl_user');
define('TBL_JOBS', 'tbl_jobs');
define('TBL_CUSTOMER', 'tbl_customer');
define('TBL_USERS_RIGHTS', 'tbl_user_rights');
define('MST_SUB_MENU', 'mst_sub_menu');
define('TBL_JOBS_UPDATES', 'tbl_jobs_updates');
define('TBL_ORDER', 'tbl_order');
define("TBL_ORDER_STATUS", "tbl_order_status");
define("TBL_ORDER_STATUS_UPDATE", "tbl_order_status_update");
define("TBL_ORDER_STATUS_FILES", "tbl_order_status_files");
define("TBL_ENGINEER", "tbl_engineer");
define("MST_MAIN", "mst_main");
define("MST_STENCIL_FORMAT", "mst_stencil_format");
define("TBL_MAIL_TEMPLATES", "tbl_mail_templates");
define("TBL_FRAME_USED", "tbl_frames_used");
define("TBL_FRAME_BORDERS", "tbl_frame_border");
define("TBL_FIDUCIAL_QUANTITY", "tbl_cad_fiducial_quantity");
define("TBL_FIDUCIAL_DCODE", "tbl_cad_fiducial_dcode");
define("TBL_FOIL_THICKNESS", "tbl_cad_foil_thickness");
define("TBL_CAD_CHECKLIST", "tbl_cad_checklist");
define("TBL_CAD_FOIL_THICKNESS", "tbl_cad_foil_thickness");

/**
 * Status of the Work Cad, Production, laser, etc
 */
define('WORK_NOT_STARTED', 0);
define('WORK_STARTED', 1);
define('WORK_COMPLETED', 2);

/**
 * Hold Status
 */

define('WORK_NOT_IN_HOLD', 0);
define('WORK_IN_HOLD', 1);

/**
 * Dropdown Types
 */
define("FRAMES_DROPDOWN", 2);
/**
 * User Rights
 */

define('CAD', 1);
define('LASER', 2);
define('PRODUCTION', 3);
define('SHIPMENT', 4);
define('INVOICE', 5);
define('PACKING', 6);
define('HOLD', 7);
define('COMPLETED', 8);
define('TOOLING_AND_PRIORITY', 9);
define('REMARKS_UPDATE', 10);
define('ADMIN', 31);

/**
 * Order Status Updates
 */

define('PRIORITY_CHANGE', 0);
define('CAD_WORKING', 1);
define('QUERY_SENT_TO_CUSTOMER', 2);
define('UNHOLD', 3);
define('CAD_STARTED_WORKING_AGAIN', 4);
define('CAD_COMPLETED', 5);
define('LASER_QR_PRINTING', 6);
define('LASER_CUTTING', 7);
define('LASER_CUTTING_COMPLETED', 8);
define('LASER_QC', 9);
define('LASER_COMPLETED', 10);
define('PRODUCTION_MOUNTING_WORKING', 11);
define('PRODUCTION_MOUNTING_COMPLETED', 12);
define('PRODUCTION_QC', 13);
define('PRODUCTION_QC_COMPLETED', 14);
define('OUT_FOR_DELIVERY', 15);
define('DELIVERED/COMPLETED', 16);
define('SHIPPED', 17);
define('CAD_CHECKLIST_ERROR_LOGS', 18);
