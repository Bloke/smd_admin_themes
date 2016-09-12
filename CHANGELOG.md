# Changelog

## 0.50 - 2016-09-12

* Updated for Txp 4.6.0 layout.
* Improved buttons and other visual tweaks.
* Shuffled things around for better workflow.

## 0.40 - 2012-09-11

* Updated for Txp 4.5.0 (thanks philwareham).
* Better folder support.
* Improved file and image handling.
* Supports sass, svg, and textile types.
* Preview facility added.
* Multi-file uploads supported.
* Placeholder image added for themes without screenshots (thanks philwareham)

## 0.31 - 2012-01-29

* D'oh, moved @smd_mkdir_recursive()@ to smd_crunchers too.

## 0.30 - 2012-01-29

* Moved (de)compression algorithms to smd_crunchers: now a required library for this plugin if you wish to import/export.

## 0.28 - 2011-09-28

* Fixed erroneous stripping of slashes on save.

## 0.27 - 2011-06-08

* *VERSION REVOKED*
* Fixed erroneous stripping of slashes on save.
* Added txp path pref (thanks maniqui)

## 0.26 - 2011-02-21

* Fixed import bug if more than one dot in filename (thanks philwareham)

## 0.25 - 2010-11-01

* Better theme integration (colours, etc).
* Fixed duplicate page renders on edit screen and added filename format option (both thanks maverick)

## 0.24 - 2010-08-06

* Fixed `fsockopen()` and undefined index warnings if not connected to the Internet / prefs not installed.

## 0.23 - 2010-02-28

* Rudimentary validation of zip file contents (thanks Tuts_and_Tipps).
* Fixed export notification.

## 0.22 - 2010-02-15

* When renaming the core theme PHP file, automatically rename folder too (thanks floodfish)

## 0.21 - 2010-02-10

* Fixed bzip2 warning (thanks thebombsite).
* Fixed recursive mkdir problem with bzip2 files (thanks PHP manual comments).
* Fixed rogue temp file left behind with zip import.

## 0.20 - 2010-02-09

* Native support for zip importing and exporting (almost) irrespective of your PHP environment.
* Zip is now the default system.
* Better notification of supported compression types and more robust rejection if something is missing.

## 0.14 - 2009-11-09

* Moved URLs in line with Textgarden layout alterations (thanks for the headsup thebombsite).
* Made feeds more robust in the event Textgarden is down / under maintenance (thanks mlarino).

## 0.13 - 2009-11-04

* Removed `ereg_replace` to conform with PHP5.3+ (thanks thebombsite).
* Changed 'global' to 'default'.
* Fixed rogue untranslated string.

## 0.12 - 2009-11-02

* Reduced theme feed clutter in the prefs table.

## 0.11 - 2009-09-03

* Improved Textgarden theme feed and links.
* Improved file support (both thanks thebombsite).
* Made global theme more obvious.
* Altered prefs panel a bit.
* Added `.ssc` support.
* Ignored `.svn` subdirs (all thanks pieman).
* Improved warning messages.
* Misc fixes and housekeeping.

## 0.10 - 2009-06-12

* Initial public beta
