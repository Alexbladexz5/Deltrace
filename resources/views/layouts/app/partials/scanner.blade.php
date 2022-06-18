<!-- Modal scanner-->
<div class="modal fade" id="modal-scanner" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-body">
                <div>
                    <div id="interactive"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="closeScannerButton">Close</button>
            </div>
        </div>
    </div>
</div>



<!-- SCRIPTS -->
<script src="https://serratus.github.io/quaggaJS/javascripts/scale.fix.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@ericblade/quagga2/dist/quagga.min.js"></script>
<script src="{{ asset('/js/app/scanner.js') }}"></script>
