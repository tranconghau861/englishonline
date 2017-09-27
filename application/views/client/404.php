<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config = $this->setting->items();
$lang = $this->config->item('language_abbr');
?>


  <main class="main">
    <div class="container-content">
      <div class="container">
        <div class="main-content clearfix">
          <div class="not-found" style="color: #fff;">
	          <?php if($lang=='vi'){ ?>
	          
	          	<h3>Không tìm thấy trang</h3>
				<p>Chúng tôi xin lỗi, chúng tôi không thể tìm thấy trang bạn đang tìm kiếm.</p>
				<p>Các trang web mà bạn đang tìm kiếm có thể đã được đổi tên hoặc là không còn nữa.</p>
				<p>Xác định vị trí đúng trang, xin vui lòng duyệt qua các trình đơn trên.</p>
				<p>Nhập từ khóa vào hộp tìm kiếm hoặc sử dụng tìm kiếm nâng cao để xác định vị trí đúng trang.</p>
				<p>Nếu vẫn không tìm thấy được trang web, xin vui lòng liên hệ đến <b><?php echo safe_mailto($config['email']); ?></b> để được hỗ trợ một cách tốt nhất.</p>
	          	
	          <?php } else { ?>
	          
	          	<h3>Not found 404!</h3>
				<p>Chúng tôi xin lỗi, chúng tôi không thể tìm thấy trang bạn đang tìm kiếm.</p>
				<p>Các trang web mà bạn đang tìm kiếm có thể đã được đổi tên hoặc là không còn nữa.</p>
				<p>Xác định vị trí đúng trang, xin vui lòng duyệt qua các trình đơn trên.</p>
				<p>Nhập từ khóa vào hộp tìm kiếm hoặc sử dụng tìm kiếm nâng cao để xác định vị trí đúng trang.</p>
				<p>Nếu vẫn không tìm thấy được trang web, xin vui lòng liên hệ đến <b><?php echo safe_mailto($config['email']); ?></b> để được hỗ trợ một cách tốt nhất.</p>
	          
	          <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </main>