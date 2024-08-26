<div class="modal fade" id="socialModal" tabindex="-1" role="dialog" aria-labelledby="socialModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content col-12">
            <div class="modal-header">
                <h5 class="modal-title">Share</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <div class="modal-body">
                <div class="icon-container1 d-flex">
                    <div class="smd" onclick="sharePost('facebook','{{$contentURL}}')"> <i class="img-thumbnail fab fa-facebook fa-2x" style="color: #3b5998;background-color: #eceff5;"></i>
                        <p>Facebook</p>
                    </div>
                    <div class="smd" onclick="sharePost('whatsapp','{{$contentURL}}')"> <i class="img-thumbnail fab fa-whatsapp fa-2x" style="color: #25D366;background-color: #cef5dc;"></i>
                        <p>Whatsapp</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>