<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:36:"addon/imginput/view/index\index.html";i:1493273633;}*/ ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $static_path; ?>/css/webuploader.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $static_path; ?>/css/style.css" />
    
    <div id="wrapper" style="width: 80%;" class="remodal"  role="dialog" aria-labelledby="image_upload" aria-describedby="图片上传">
        
        <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
        
        <div id="container">
            <!--头部，相册选择和格式选择-->

            <div id="uploader">
                <div class="queueList">
                    <div id="dndArea" class="placeholder">
                        <div id="filePicker"></div>
                        <p>支持拖动照片上传，与QQ截图粘贴上传。</p>
                    </div>
                </div>
                <div class="statusBar" style="display:none;">
                    
                    <div class="progress">
                        <span class="text">0%</span>
                        <span class="percentage"></span>
                    </div>
                    
                    <div class="info"></div>
                    <div class="btns">
                        <div id="filePicker2"></div><div class="uploadBtn">开始上传</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo $static_path; ?>/dist/webuploader.min.js"></script>
    <script type="text/javascript" src="<?php echo $static_path; ?>/js/upload.js"></script>
    