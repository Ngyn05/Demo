# Demo Product List Application

Ứng dụng hiển thị danh sách sản phẩm với backend PHP và frontend HTML/JavaScript được triển khai trên các host khác nhau.

## Cấu trúc thư mục

```
Demo/
├── backend/
│   ├── db.php
│   ├── get_products.php
│   └── get_products_rest.php
└── frontend/
    └── index.html
```

## Triển khai Backend

1. Upload toàn bộ nội dung thư mục `backend/` lên host PHP của bạn (ví dụ: Render.com)
2. Cấu hình các biến môi trường sau trên host:
   - `SUPABASE_REST_URL`: URL của Supabase REST API
   - `SUPABASE_SERVICE_ROLE_KEY`: Service Role Key của Supabase
3. Đảm bảo PHP có hỗ trợ cURL extension
4. Test API endpoint bằng cách truy cập `https://your-backend-url.com/get_products_rest.php`

## Triển khai Frontend

1. Mở file `frontend/index.html`
2. Thay đổi biến `API_URL` thành URL thật của backend:
   ```javascript
   const API_URL = 'https://your-backend-url.com/get_products_rest.php';
   ```
3. Upload file `index.html` lên host static của bạn (ví dụ: GitHub Pages, Netlify, Vercel)

## Bảo mật

1. Backend đã được cấu hình CORS để chấp nhận request từ mọi origin (`Access-Control-Allow-Origin: *`)
2. Đảm bảo bảo mật các biến môi trường chứa thông tin nhạy cảm
3. Nên giới hạn CORS origin trong môi trường production