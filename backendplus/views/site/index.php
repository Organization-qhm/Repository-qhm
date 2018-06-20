<?php

use yii\helpers\Url;
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = '企好名 Backend';
?>
<div class="site-index">
    
    <div class="page-header">
        <h1>Welcome to 企好名 Backend <small>You can manage data here.</small></h1>
    </div>
    
    <div class="raw">
    	<div class="col-md-6">
        	<div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">排序规则说明</h3>
        
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                      <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                      <i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                    <ul>
                    <li>按排序数值从大向小排列, 默认值为100</li>
                    <li>排序数值相同，按添加时间，从后向前排列</li>
                    </ul>
                </div>
                <!-- /.box-body -->
              </div>
    	</div>
    </div>
</div>
