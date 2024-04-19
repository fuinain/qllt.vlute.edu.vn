import mysql.connector
import requests

try:
    # Kết nối tới cơ sở dữ liệu MySQL
    conn = mysql.connector.connect(
        host='localhost',
        database='quanlylichtrinh',
        user='root',
        password='root',
        port=3306
    )
    cursor = conn.cursor()

    # Lấy dữ liệu từ API
    url = "https://ems.vlute.edu.vn/api/danhmuc/getdshocky"
    response = requests.get(url)
    data = response.json()

    # Đẩy dữ liệu vào bảng hoc_ky
    for hoc_ky in data:
        maHK = hoc_ky['maHK']
        tenHK = hoc_ky['tenHK']
        ngayBD = hoc_ky['ngayBD']
        ngayHT = hoc_ky['ngayHT']
        namHoc = hoc_ky['namHoc']
        tuanBD = hoc_ky['tuanBD']
        soTuan = hoc_ky['soTuan']
        loaiHK = hoc_ky['loaiHK']
        hoc_ky_id = hoc_ky['id']

        # Kiểm tra xem dữ liệu đã tồn tại trong bảng hay chưa
        cursor.execute("SELECT id FROM hoc_ky WHERE id = %s", (hoc_ky_id,))
        existing_record = cursor.fetchone()

        # Nếu dữ liệu chưa tồn tại, thêm vào bảng
        if not existing_record:
           # Sử dụng placeholder %s để tránh lỗi SQL Injection
           cursor.execute('''INSERT INTO hoc_ky (id, ma_hoc_ky, ten_hoc_ky, ngay_bat_dau, ngay_ket_thuc, nam_hoc, tuan_bat_dau, so_tuan, loai_hoc_ky)
                             VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)''',
                             (hoc_ky_id, maHK, tenHK, ngayBD, ngayHT, namHoc, tuanBD, soTuan, loaiHK))
#         else:
#            print(f"Đã có {maHK} trong cơ sở dữ liệu")

    # Lưu thay đổi và đóng kết nối
    conn.commit()
    conn.close()
except mysql.connector.Error as err:
    print("Lỗi MySQL:", err)

except requests.RequestException as req_err:
    print("Lỗi khi gửi yêu cầu tới API:", req_err)

except Exception as e:
    print("Đã xảy ra lỗi:", e)
