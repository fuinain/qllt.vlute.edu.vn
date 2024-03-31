php artisan key:generate (tạo key)

----------------------------------
php artisan make:controller [tenController]
php artisan make:model [tenModel]

Quy ước:
Model:
+ danhSach: Dành cho hiển thị danh sách
+ them: Danh cho thêm mới
+ capNhat: Dành cho cập nhật
+ xoa: Dành cho xoá
+ chiTiet: Danh cho lấy chi tiết

Controller: 
+ get<TenFunionController>: Dành cho hiển thị danh sách
+ put<TenFunionController>: Danh cho thêm mới
+ post<TenFunionController>: Dành cho cập nhật
+ delete<TenFunionController>: Dành cho xoá
