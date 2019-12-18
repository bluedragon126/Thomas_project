/**
 * Radio.js
 *
 * Released under LGPL License.
 * Copyright (c) 1999-2015 Ephox Corp. All rights reserved
 *
 * License: https://www.tinymce.com/license
 * Contributing: https://www.tinymce.com/contributing
 */

/**
 * Creates a new radio button.
 *
 * @-x-less Radio.less
 * @class tinymce.ui.Radio
 * @extends tinymce.ui.Checkbox
 */
define("tinymce/ui/Radio", [
	"tinymce/ui/Checkbox"
], function(Checkbox) {
	"use strict";

	return Checkbox.extend({
		Defaults: {
			classes: "radio",
			role: "radio"
		}
	});
});