<?php

namespace Yunpian\Tests\Sdk\Api;

use PHPUnit\Framework\TestCase;
use Yunpian\Sdk\Constant\YunpianConstant;
use Yunpian\Sdk\Model\FrameData;
use Yunpian\Sdk\Model\VideoFrame;
use Yunpian\Sdk\Model\VideoLayout;

/**
 *
 * @author dzh
 * @since 1.0.2
 */
class VideoSmsApiTest extends TestCase {
    use YunpianApiInit;

    function _test_addTpl() {
        $clnt = $this->clnt;

        //frame1
        $fd1 = new FrameData();
        $fd1->index(1)->fileName("data1.txt");
        $fd2 = new FrameData();
        $fd2->index(2)->fileName("data2.mp4");
        $fr1 = new VideoFrame();
        $fr1->index(1)->attachments([$fd1, $fd2]);
        //frame2 maybe ..

        // layout
        $layout = new VideoLayout();
        $layout->subject('restapitest php')->frames([$fr1]);
        // print_r(json_encode($layout));

        // material
        $filename = "/Users/dzh/temp/vsms/Archive.zip";
        $handle = fopen($filename, "rb");
        $contents = fread($handle, filesize($filename));
        // $byteArray = unpack("N*", $contents);
        fclose($handle);

        $param = [YunpianConstant::SIGN     => '【企盆阔记】', YunpianConstant::LAYOUT => $layout,
                  YunpianConstant::MATERIAL => $contents];
        $r = $clnt->vsms()->addTpl($param);
        var_dump($r);
    }


    function _test_getTpl() {
        $clnt = $this->clnt;

        $param = [YunpianConstant::TPL_ID => 117];
        var_dump($clnt->vsms()->getTpl($param));
    }

    function _test_tplBatchSend() {
        $clnt = $this->clnt;

        $param = [YunpianConstant::TPL_ID => 1, YunpianConstant::MOBILE => '18616020610,18616020611'];
        var_dump($clnt->vsms()->tplBatchSend($param));
    }

}