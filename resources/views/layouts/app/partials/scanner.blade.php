<div>
    <div class="controls">
        <fieldset class="input-group">
            <button class="stop">Stop</button>
        </fieldset>
        <fieldset class="reader-config-group">
            <label>
                <span>Barcode-Type</span>
                <select name="decoder_readers">
                    <option value="code_128" selected="selected">Code 128</option>
                    <option value="code_39">Code 39</option>
                    <option value="code_39_vin">Code 39 VIN</option>
                    <option value="ean">EAN</option>
                    <option value="ean_extended">EAN-extended</option>
                    <option value="ean_8">EAN-8</option>
                    <option value="upc">UPC</option>
                    <option value="upc_e">UPC-E</option>
                    <option value="codabar">Codabar</option>
                    <option value="i2of5">I2of5</option>
                    <option value="2of5">Standard 2 of 5</option>
                    <option value="code_93">Code 93</option>
                </select>
            </label>
            <label>
                <span>Resolution (long side)</span>
                <select name="input-stream_constraints">
                    <option value="320x240">320px</option>
                    <option selected="selected" value="640x480">640px</option>
                    <option value="800x600">800px</option>
                    <option value="1280x720">1280px</option>
                    <option value="1600x960">1600px</option>
                    <option value="1920x1080">1920px</option>
                </select>
            </label>
            <label class="hidden">
                <span>Patch-Size</span>
                <select name="locator_patch-size">
                    <option value="x-small">x-small</option>
                    <option value="small">small</option>
                    <option selected="selected" value="medium">medium</option>
                    <option value="large">large</option>
                    <option value="x-large">x-large</option>
                </select>
            </label>
            <label class="hidden">
                <span>Half-Sample</span>
                <input type="checkbox" checked="checked" name="locator_half-sample" />
            </label>
            <label>
                <span>Workers</span>
                <select name="numOfWorkers">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option selected="selected" value="4">4</option>
                    <option value="8">8</option>
                </select>
            </label>
            <label>
                <span>Camara</span>
                <select name="input-stream_constraints" id="deviceSelection">
                </select>
            </label>
            <label style="display: none">
                <span>Zoom</span>
                <select name="settings_zoom"></select>
            </label>
        </fieldset>
    </div>
    <div id="result_strip">
        <ul class="thumbnails"></ul>
    </div>
    <div id="interactive" class="viewport"></div>
</section>
<script src="live_w_locator.js" type="text/javascript"></script>
    <script src="https://serratus.github.io/quaggaJS/javascripts/scale.fix.js"></script>

<!-- SCRIPTS -->
<script src="https://cdn.jsdelivr.net/npm/@ericblade/quagga2/dist/quagga.min.js"></script>