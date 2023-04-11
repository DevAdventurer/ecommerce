
<div class="offcanvas mediaselectionlist offcanvas-end" tabindex="-1" id="mediafiles" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header border-bottom">
        <input type="search" placeholder="Search" name="search" id="mediafilesearch" class="form-control">
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-0 overflow-hidden text-center">
        <div data-simplebar class="p-2" style="height: calc(100vh - 116px);padding-bottom: 12px;">





            <div class="dropzone mb-3">
                <div class="fallback">

                    <input name="file" type="file" multiple="multiple">

                </div>
                <div class="dz-message needsclick">
                    <div class="mb-3">
                        <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                        <span>Choose or drag file here</span>
                    </div>

                </div>
            </div>

            <ul class="d-none list-unstyled mb-0" id="dropzone-preview">
                <li class="mt-2" id="dropzone-preview-list">
                    <!-- This is used as the file preview template -->
                    <div class="border rounded">
                        <div class="d-flex p-2">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar-sm bg-light rounded">
                                    <img data-dz-thumbnail class="img-fluid rounded d-block" src="#"
                                        alt="Dropzone-Image" />
                                </div>

                            </div>
                            <div class="flex-grow-1">
                                <div class="pt-1">
                                    <h5 class="fs-14 mb-1" data-dz-name>&nbsp;</h5>
                                    <p class="fs-13 text-muted mb-0" data-dz-size></p>
                                    <strong class="error text-danger" data-dz-errormessage></strong>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </li>
            </ul>

            <div id="getdata" class="">
            </div>
            

            <?php
            $medias = App\Models\Media::orderBy('created_at', 'desc')->select('id', 'file', 'name')->paginate(10);
            ?>
        

            <a id="load-more-mediafiles" class="btn-sm btn-soft-success" href="javascript:void(0);" first-page="1" current-page="<?php echo e($medias->currentPage()); ?>" last-page="<?php echo e($medias->lastPage()); ?>">Loadmore</a>

        </div>
    </div>
    <div class="offcanvas-foorter border p-1 text-center">
        <button onclick="selectSingleFile()" class="btn">Select File</button>
    </div>
</div>



<?php /**PATH /Users/asifjamal/Documents/ecommerce/resources/views/admin/media/media-files.blade.php ENDPATH**/ ?>