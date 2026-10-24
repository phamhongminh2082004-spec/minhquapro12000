<footer class="site-footer">
    <div class="container footer-grid">
        <div>
            <strong>{{ config('app.name') }}</strong>
            <p>Tin tức và góc nhìn được cập nhật mỗi ngày.</p>
        </div>
        <div>
            <strong>Liên kết</strong>
            <ul>
                <li><a href="#">Giới thiệu</a></li>
                <li><a href="#">Liên hệ</a></li>
                <li><a href="#">Chính sách bảo mật</a></li>
            </ul>
        </div>
        <div>
            <strong>Theo dõi</strong>
            <ul>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">RSS</a></li>
            </ul>
        </div>
    </div>
    <p class="copy">© {{ date('Y') }} {{ config('app.name') }}</p>
</footer>
