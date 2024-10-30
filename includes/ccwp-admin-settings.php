<?php 

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

/**
 * @version 1.0.4
 */

?>
<div class="wrap">
	<h1 class="wp-heading-inline"><?php echo CCWP_NAME; ?></h1>
	<hr>
    <div class="ccwp-row">
		<div class="col-12 col-lg-8">
            <h1><?php _e('Settings', CCWP_PLUGIN_SLUG); ?></h1>
        </div>
		<div class="col-12 col-lg-4">
            <h1><?php _e('Preview', CCWP_PLUGIN_SLUG); ?></h1>
        </div>
    </div>
	<div class="ccwp-row">
		<div class="col-12 col-lg-8">
			<form
				id="widget-settings"
                data-lang-text1='<?php _e('Language', CCWP_PLUGIN_SLUG); ?>'
                data-lang-text2='<?php _e('Select gradient', CCWP_PLUGIN_SLUG); ?>'
                data-lang-text3='<?php _e('Select color', CCWP_PLUGIN_SLUG); ?>'
                data-plugin-path='<?php echo CCWP_URL; ?>'
				data-languages-data='<?php echo CCWP_LANGUAGES_DATA; ?>'
				data-currency-list='<?php echo CCWP_CURRENCY_LIST; ?>'
				data-color-data='<?php echo CCWP_COLOR_DATA; ?>'
				data-gradient-data='<?php echo CCWP_GRADIENT_DATA; ?>'>
				<table class="form-table ccwp-form-table">
					<tbody>
						<tr>
							<th scope="ccwp-row">
								<label for="crypto"><?php _e('Amount', CCWP_PLUGIN_SLUG); ?></label>
							</th>
							<td>
								<div class="ccwp-row">
									<div class="col-12 col-lg-6"><input id="amount" name="amount" autocomplete="off" value="1" type="text" class="ccwp-w100"></div>
									<div class="col-12 col-lg-6"><select name="lang" id="lang"></select></div>
								</div>
							</td>
						</tr>
						<tr>
							<th scope="ccwp-row">
								<label for="from"><?php _e('Base / Quote', CCWP_PLUGIN_SLUG); ?></label>
							</th>
							<td>
								<div class="ccwp-row">
									<div class="col-12 col-lg-6">
                                        <select name="from" id="from"></select>
                                    </div>
									<div class="col-12 col-lg-6">
                                        <select name="to" id="to"></select>
                                    </div>
								</div>
							</td>
						</tr>
						<tr>
							<th scope="ccwp-row">
								<label for="background-color"><?php _e('Style', CCWP_PLUGIN_SLUG); ?></label>
							</th>
							<td>
								<div class="ccwp-row">
									<div class="col-12 col-lg-6">
                                        <label for="color-data">
										    <select id="color-data"></select>
										</label>
									</div>
									<div class="col-12 col-lg-6">
                                        <input id="background-color" name="background-color" type="text" value="#4776E6">
                                    </div>
								</div>
								<br>
								<div class="ccwp-row">
									<div class="col-12 col-lg-6" style="align-self:center">
                                        <label for="background">
										    <select id="background"></select>
                                            <input type="hidden" name="background" value="linear-gradient(120deg,#4776E6,#8E54E9)">
										</label>
									</div>
                                    <div class="col-12 col-lg-6">
                                        <label for="gradient-direction" class="ccwp-va-m"> 
                                            <?php _e('Direction', CCWP_PLUGIN_SLUG); ?>
                                            <input class="ccwp-va-m" type="range" id="gradient-direction" min="1" max="360" step="1" value="120" oninput="this.setAttribute('value', this.value);">
										</label>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<th scope="ccwp-row">
								<label for="format"><?php _e('Format', CCWP_PLUGIN_SLUG); ?></label>
							</th>
							<td>
								<div class="ccwp-row">
									<div class="col-12 col-lg-6">
										<select id="format" class="ccwp-w100"></select>
                                        <input type="hidden" name="separator" id="separator" value=",">
                                        <input type="hidden" name="decimal-point" id="decimal-point" value=".">
									</div>
									<div class="col-12 col-lg-6">
                                        <label for="decimals">
										    <input type="number" id="decimals" name="decimals" value="2" min="0" max="7" class="ccwp-w100">
                                        </label>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<th>
								<label for="options"><?php _e('Options', CCWP_PLUGIN_SLUG); ?></label>
							</th>
							<td>
								<div class="ccwp-row">
									<div class="col-12 col-lg-6">
										<ul>
											<li><label><input name="large" value="true" type="checkbox"> <?php _e('Large', CCWP_PLUGIN_SLUG); ?></label></li>
											<li><label><input name="shadow" value="true" type="checkbox" checked> <?php _e('Shadow', CCWP_PLUGIN_SLUG); ?></label></li>
											<li><label><input name="symbol" value="true" type="checkbox" checked> <?php _e('Symbol', CCWP_PLUGIN_SLUG); ?></label></li>
										</ul>
									</div>
									<div class="col-12 col-lg-6">
										<ul>
											<li><label><input name="grouping" value="true" type="checkbox" checked> <?php _e('Grouping', CCWP_PLUGIN_SLUG); ?></label></li>
											<li><label><input name="border" value="true" type="checkbox"> <?php _e('Border', CCWP_PLUGIN_SLUG); ?></label></li>
											<li><label><input name="signature" value="true" type="checkbox" checked> <?php _e('Signature', CCWP_PLUGIN_SLUG); ?></label></li>
											<li>
												<label class="ccwp-va-m" for="border-radius"><?php _e('Radius', CCWP_PLUGIN_SLUG); ?>
												    <input type="range" class="ccwp-va-m" name="border-radius" id="border-radius" min="0.1" max="0.5" step="0.05" value="0.25" oninput="this.setAttribute('value', this.value);">
												</label>
											</li>
										</ul>
									</div>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
		<div class="col-12 col-lg-4">
            <div class="ccwp-buttons">
                <b><?php _e('Widget:', CCWP_PLUGIN_SLUG); ?></b>
                <label for="widget-normal"><input type="radio" name="widget-version" id="widget-normal" value="fxwidget-cc" checked><?php _e('Normal', CCWP_PLUGIN_SLUG); ?></label>
                <label for="widget-multi"><input type="radio" name="widget-version" id="widget-multi" value="fxwidget-ccp"><?php _e('Multi', CCWP_PLUGIN_SLUG); ?></label>
            </div>
			<div id="ccwp-widget"></div>
		</div>
	</div>
	<hr>
	<div class="ccwp-row">
		<div class="col-12 col-lg-6">
			<h3><?php _e('Shortcode', CCWP_PLUGIN_SLUG); ?></h3>
			<?php wp_editor('', 'widget-shortcode', [
				'wpautop' => 1,
				'media_buttons' => 0,
				'textarea_name' => '',
				'textarea_rows' => 4,
				'tabindex' => null,
				'teeny' => 0,
				'dfw' => 0,
				'tinymce' => 0,
				'quicktags' => 0,
				'drag_drop_upload' => false,
				]); ?>
		</div>
		<div class="col-12 col-lg-6">

        <h3><?php _e('Help', CCWP_PLUGIN_SLUG); ?></h3>
            <ul>
                <li>ℹ️ <?php _e('Official website', CCWP_PLUGIN_SLUG); ?>: <a href="https://fx-w.io/" rel="noopener nofollow" target="_blank">FX-W.io</a> | <a href="https://github.com/fx-w-io" rel="noopener nofollow" target="_blank">Github</a></li>
                <li>❓ <?php _e('Questions', CCWP_PLUGIN_SLUG); ?>: <a href="https://t.me/converter_support" rel="noopener nofollow" target="_blank"><?php _e('Online support', CCWP_PLUGIN_SLUG); ?></a></li>
                <li>💹 <?php _e('Supported by', CCWP_PLUGIN_SLUG); ?>: <a href="https://currencyrate.today/" rel="noopener nofollow" target="_blank">CurrencyRate</a></li>
                <li>💵 <?php _e('Fiat money', CCWP_PLUGIN_SLUG); ?>: <a href="https://currencyconvert.online/" rel="noopener nofollow" target="_blank">CurrencyConvert.ONLINE</a></li>
            </ul>
		</div>
	</div>
    <div class="ccwp-row">
		<div class="col-12 col-lg-8">
            <h2><?php _e('Install', CCWP_PLUGIN_SLUG); ?></h2>
            <ol>
                <li><?php _e('Generate shortcode from widget settings', CCWP_PLUGIN_SLUG); ?>;</li>
                <li><?php _e('Copy shortcode', CCWP_PLUGIN_SLUG); ?>;</li>
                <li><?php _e('Go to post, page or Appearance <b>&gt;&gt;</b> Widgets', CCWP_PLUGIN_SLUG); ?>;</li>
                <li><?php _e('Paste shortcode to field', CCWP_PLUGIN_SLUG); ?>.</li>
            </ol>
            <h2><?php _e('FAQ', CCWP_PLUGIN_SLUG); ?></h2>
            <details>
                <summary><?php _e('How manage the colour of the widget?', CCWP_PLUGIN_SLUG); ?></summary>
                <?php _e('There are two attributes:', CCWP_PLUGIN_SLUG); ?>
                <b>background</b>, <b>background-color</b>.
                <ol>
                    <li><?php _e('The <b>background</b> shorthand CSS property sets all background style properties at once, such as color, image, origin and size, or repeat method.', CCWP_PLUGIN_SLUG); ?></li>
                    <li><?php _e('The <b>background-color</b> CSS property sets the background color of an element.', CCWP_PLUGIN_SLUG); ?></li>
                </ol>
            </details>
            <details>
                <summary><?php _e('How sort the currency list in the multi-currency widget?', CCWP_PLUGIN_SLUG); ?></summary>
                <?php _e('The attribute <b>sel-curr</b> contains a list of currency codes that you can sort yourself.', CCWP_PLUGIN_SLUG); ?><br>
                <?php _e('For example, <b>sel-curr="EUR,GBP,CAD,AUD"</b> means that the currency will be displayed in the following order: Euro, Pound Sterling, Canadian and Australian dollar.', CCWP_PLUGIN_SLUG); ?>
            </details>
            <details>
                <summary><?php _e('Language?', CCWP_PLUGIN_SLUG); ?></summary>
                <?php _e('If you set by language how <b>Auto</b> your users will see the widget in their language. Determined by the client\'s browser.', CCWP_PLUGIN_SLUG); ?><br>
                <a href="https://fx-w.io/languages/">https://fx-w.io/languages/</a>
            </details>
            <details>
                <summary><?php _e('What currencies and crypto are supported?', CCWP_PLUGIN_SLUG); ?></summary>
                <?php _e('A complete list of currencies and codes is available on the official website of the widget.', CCWP_PLUGIN_SLUG); ?><br>
                <a href="https://fx-w.io/currencies/">https://fx-w.io/currencies/</a>
            </details>
        </div>
    </div>
</div>
<script>
jQuery(document).ready(function () {
    var format_amount = [
        { separator: ",", "decimal-point": ".", amount: "1,000.99" },
        { separator: " ", "decimal-point": ".", amount: "1 000.99" },
        { separator: "'", "decimal-point": ".", amount: "1'000.99" },
        { separator: "", "decimal-point": ".", amount: "1000.99" },
        { separator: " ", "decimal-point": ",", amount: "1 000,99" },
        { separator: "", "decimal-point": ",", amount: "1000,99" },
        { separator: "'", "decimal-point": ",", amount: "1'000,99" },
    ];
    jQuery.each(format_amount, function (index, value) {
        jQuery("#format").append(
            jQuery("<option/>", {
                value: index,
                text: value["amount"],
            })
        );
    });
    /* Functions START */
    var padZero = function (str, len) {
        len = len || 2;
        var zeros = new Array(len).join("0");
        return (zeros + str).slice(-len);
    };
    var invertColor = function (hex, bw) {
        if (hex.indexOf("#") === 0) {
            hex = hex.slice(1);
        }
        // convert 3-digit hex to 6-digits.
        if (hex.length === 3) {
            hex = hex[0] + hex[0] + hex[1] + hex[1] + hex[2] + hex[2];
        }
        if (hex.length !== 6) {
            throw new Error("Invalid HEX color.");
        }
        var r = parseInt(hex.slice(0, 2), 16),
            g = parseInt(hex.slice(2, 4), 16),
            b = parseInt(hex.slice(4, 6), 16);
        if (bw) {
            // https://stackoverflow.com/a/3943023/112731
            return r * 0.299 + g * 0.587 + b * 0.114 > 186
                ? "#000000"
                : "#FFFFFF";
        }
        // invert color components
        r = (255 - r).toString(16);
        g = (255 - g).toString(16);
        b = (255 - b).toString(16);
        // pad each with zeros and return
        return "#" + padZero(r) + padZero(g) + padZero(b);
    };
    var objToString = function (array, ver) {
        console.log(array);
        var output = '[currency-converter-widget-pro type="' + ver + '" ';
        for (var i = 0; i < array.length; i++) {
            output = output + array[i].name + '="' + array[i].value + '" ';
        }
        return output.substring(0, output.length - 1) + "]";
    };
    var objToAttr = function (array) {
        output = {};
        for (item in array) {
            k = array[item].name;
            v = array[item].value;
            output[k] = v;
        }
        return output;
    };
    jQuery.fn.removeAttributes = function () {
        return this.each(function () {
            var attributes = jQuery.map(this.attributes, function (item) {
                return item.name;
            });
            var img = jQuery(this);
            jQuery.each(attributes, function (i, item) {
                img.removeAttr(item);
            });
        });
    };
    /* Functions END */
    /* Functions Select2 START */
    function formatState(state) {
        if (!state.id) {
            return state.text;
        }
        var baseUrl = widgetSettings.data("plugin-path") + "assets/flags";
        var flags = {
            bcn: "xpf",
            clf: "clp",
            byr: "byn",
            cnh: "cny",
            cuc: "cup",
            cyp: "xpf",
            eek: "xpf",
            grd: "xpf",
            iep: "xpf",
            mga: "xpf",
            mtl: "xpf",
            rby: "xpf",
            sit: "xpf",
            skk: "xpf",
            std: "stn",
            veb: "vef",
            ves: "vef",
            vef_blkmkt: "vef",
            vef_dicom: "vef",
            vef_dipro: "vef",
            vef_simadi: "vef",
            xcp: "xpf",
            xdr: "xpf",
            xem: "xpf",
            zmk: "zmw",
            zwl: "zwd",
        };
        var flagIcon = state.element.value.toLowerCase();

        var $state = jQuery(
            '<span><img src="' +
                baseUrl +
                "/" +
                (flags[flagIcon]
                    ? flags[flagIcon]
                    : state.element.value.toLowerCase()) +
                '.svg" width="16" alt="' +
                state.element.value.toUpperCase() +
                '"> ' +
                state.text +
                "</span>"
        );
        return $state;
    }
    function formatState2(state) {
        if (!state.id) {
            return state.text;
        }
        var $state = jQuery(
            '<span style="background-color:' +
                state.id +
                ";color:" +
                invertColor(state.id, true) +
                '">' +
                state.text +
                " - " +
                state.id +
                "</span>"
        );
        return $state;
    }
    function formatState3(state) {
        if (!state.id) {
            return state.text;
        }
        var $state = jQuery(
            '<span style="background:linear-gradient(120deg,' +
                state.id +
                ");color:" +
                invertColor(state.id.split(",")[0], true) +
                '">' +
                state.text +
                "</span>"
        );
        return $state;
    }
    /* Functions Select2 END */
    // Vars
    var widgetSettings = jQuery("form#widget-settings");
    /* Select2 START */
    jQuery('select[name="from"],select[name="main-curr"]')
        .select2({
            width: "100%",
            data: widgetSettings.data("currency-list"),
            templateSelection: formatState,
            templateResult: formatState,
        })
        .val("USD")
        .trigger("change");
    jQuery('select[name="to"],select[name="sel-curr"]')
        .select2({
            width: "100%",
            data: widgetSettings.data("currency-list"),
            templateSelection: formatState,
            templateResult: formatState,
        })
        .val("EUR")
        .trigger("change");
    jQuery('select[name="lang"]')
        .select2({
            width: "100%",
            placeholder: widgetSettings.data("lang-text1"),
            data: widgetSettings.data("languages-data"),
        })
        .val("auto")
        .trigger("change");
    jQuery("select#background")
        .select2({
            width: "100%",
            placeholder: widgetSettings.data("lang-text2"),
            data: widgetSettings.data("gradient-data"),
            templateSelection: formatState3,
            templateResult: formatState3,
        })
        .val("#4776E6,#8E54E9")
        .trigger("change");
    jQuery("#color-data")
        .select2({
            width: "100%",
            placeholder: widgetSettings.data("lang-text3"),
            data: widgetSettings.data("color-data"),
            templateSelection: formatState2,
            templateResult: formatState2,
        })
        .val(null)
        .trigger("change");
    /* Select2 END */

    var _serializeData = function () {
        // Init forms
        var serializeData = widgetSettings.serializeArray();
        // Add no checked forms
        for (var v of [
            "large",
            "shadow",
            "symbol",
            "grouping",
            "border",
            "background",
        ]) {
            if (serializeData.find((x) => x.name === v) === undefined) {
                serializeData.push({
                    name: v,
                    value: "false",
                });
            }
        }
        var j = {};
        for (var i = 0; i < serializeData.length; i++) {
            if (j[serializeData[i].name] === undefined) {
                j[serializeData[i].name] = serializeData[i].value;
            } else {
                j[serializeData[i].name] += "," + serializeData[i].value;
            }
        }
        var serializeData = [];
        for (var x in j) {
            serializeData.push({
                name: x,
                value: j[x],
            });
        }
        return serializeData;
    };

    function changeSerializeData(name, value, reload = false) {
        var serializeData = _serializeData();
        for (var i = 0; i < serializeData.length; i++) {
            if (serializeData[i].name == name) {
                serializeData[i].value = value;
            }
        }
        ws(reload);
    }

    // Changes
    jQuery('input[type="checkbox"]').on("change", function () {
        var value = jQuery(this).prop("checked");
        var name = jQuery(this).attr("name");
        changeSerializeData(name, value, true);

        /* value = (value) ? 1:0; */
        /* localStorage.setItem('CCWP_' + jQuery(this).prop("tagName") + jQuery(this).attr("name"), value); */
    });

    jQuery('input[name="background-color"]').wpColorPicker({
        defaultColor: !1,
        change: function (t, e) {
            var value = jQuery(this).iris("color", !0).toCSS("hex");
            var name = jQuery(this).attr("name");
            jQuery(this).val(value);
            changeSerializeData(name, value);
            changeSerializeData("background", "false");
            /* jQuery('#color-data').val(null); */
        },
        clear: function () {},
        hide: !0,
    });

    jQuery(
        'input[name="border-radius"],input[name="amount"],input[name="decimals"]'
    ).on("input", function () {
        var value = jQuery(this).val();
        var name = jQuery(this).attr("name");
        changeSerializeData(name, value, name === "decimals" ? true : false);
    });

    jQuery("#color-data").on("change", function () {
        var value = jQuery(this).val();
        jQuery('input[name="background-color"]').val(value).trigger("change");
    });

    jQuery("select#background").on("change", function () {
        var value = jQuery(this).val();
        var name = jQuery(this).attr("name");
        var linear =
            "linear-gradient(" +
            jQuery("#gradient-direction").val() +
            "deg," +
            value +
            ")";
        jQuery('input[name="background-color"]')
            .val(value.split(",")[0])
            .trigger("change");
        jQuery('input[name="background"]').val(linear);
        changeSerializeData("background", linear);
    });

    jQuery('input[name="widget-version"]').on("change", function () {
        var value = jQuery(this).val();
        if (value === "fxwidget-ccp") {
            jQuery("select#from").attr("name", "main-curr");
            jQuery("select#to")
                .attr({ name: "sel-curr", multiple: "multiple" })
                .val(["EUR", "GBP", "CHF", "CAD", "AUD", "JPY", "BTC"])
                .select2({
                    width: "100%",
                    templateSelection: formatState,
                    templateResult: formatState,
                });
        } else if (value === "fxwidget-cc") {
            jQuery("select#from").attr("name", "from");
            jQuery("select#to")
                .attr({ name: "to", multiple: false })
                .val("EUR")
                .select2({
                    width: "100%",
                    templateSelection: formatState,
                    templateResult: formatState,
                });
        }
        ws(true);
    });

    jQuery("#gradient-direction").on("input", function () {
        var value = jQuery(this).val();
        var colors = jQuery("select#background").val();
        var linear = "linear-gradient(" + value + "deg," + colors + ")";

        jQuery('input[name="background"]').val(linear);
        changeSerializeData("background", linear);
    });

    jQuery("#format").on("change", function () {
        var value = jQuery(this).val();
        jQuery("input#separator").val(format_amount[value]["separator"]);
        jQuery("input#decimal-point").val(
            format_amount[value]["decimal-point"]
        );
        changeSerializeData(
            "separator",
            format_amount[value]["separator"],
            true
        );
        changeSerializeData(
            "decimal-point",
            format_amount[value]["decimal-point"],
            true
        );
    });

    jQuery('select[name="lang"]').on("change", function () {
        var value = jQuery(this).val();
        var name = jQuery(this).attr("name");
        changeSerializeData(name, value, true);
        ws(true);
    });
    jQuery('select[name="from"],select[name="to"],select[name="sel-curr"]').on(
        "change",
        function () {
            var value = jQuery(this).val();
            var name = jQuery(this).attr("name");
            changeSerializeData(name, value);
        }
    );

    var ws = function (reload = false) {
        var serializeData = _serializeData();
        var widgetVersion = jQuery(
            'input[name="widget-version"]:checked'
        ).val();

        var tj = {
            "fxwidget-cc": "normal.js",
            "fxwidget-ccp": "multi.js",
        };

        jQuery("#widget-shortcode").val(
            objToString(serializeData, widgetVersion)
        );
        if (reload) {
            if (jQuery(widgetVersion).length === 0) {
                jQuery("#ccwp-widget").append(
                    jQuery("<" + widgetVersion + "/>", {})
                );
                jQuery("body").append(
                    jQuery("<script/>", {
                        src:
                            widgetSettings.data("plugin-path") +
                            "assets/" +
                            tj[widgetVersion] +
                            "?" +
                            Math.floor(Math.random() * 10000000),
                        async: true,
                        id: "ccwp-widget-js",
                    })
                );
            }

            jQuery("#ccwp-widget-js").attr(
                "src",
                jQuery("#ccwp-widget-js").attr("src").split("?")[0] +
                    "?" +
                    Math.floor(Math.random() * 10000000)
            );
            var cloneWidget = jQuery(widgetVersion).clone();
            jQuery("#ccwp-widget").html(cloneWidget);
        }
        jQuery(widgetVersion).attr(objToAttr(serializeData));
    };

    jQuery(window).load(function () {
        ws(true);
    });
});
</script>