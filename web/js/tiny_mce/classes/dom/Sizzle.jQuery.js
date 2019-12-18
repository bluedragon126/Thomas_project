/**
 * Sizzle.jQuery.js
 *
 * Released under LGPL License.
 * Copyright (c) 1999-2015 Ephox Corp. All rights reserved
 *
 * License: https://www.tinymce.com/license
 * Contributing: https://www.tinymce.com/contributing
 */

/*global jQuery:true */

/*
 * Fake Sizzle using jQuery.
 */
define("tinymce/dom/Sizzle", [], function() {
	// Detect if jQuery is loaded
	if (!window.jQuery) {
		throw new Error("Load jQuery first");
	}

	return jQuery.find;
});
