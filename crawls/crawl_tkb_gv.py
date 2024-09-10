import requests
import mysql.connector
from bs4 import BeautifulSoup
import re
# Kết nối tới cơ sở dữ liệu MySQL
conn = mysql.connector.connect(
    host='localhost',
    database='qllt',
    user='root',
    password='root',
    port=3306
)


# Truy vấn dữ liệu từ bảng
cursor = conn.cursor()
cursor.execute('SELECT id_giang_vien, ho_ten FROM qllt.giang_vien;')
data = cursor.fetchall()  # Lấy dữ liệu đầu tiên từ kết quả truy vấn

for x in data:
    print(str(x[1]))
    cursor = conn.cursor()
    id_giang_vien = str(x[0])
    id_hoc_ky = str(41)

    str_payload = 'hocky=' + id_hoc_ky + '&' + 'magv=' + id_giang_vien + '&' + 'hocky=' + id_hoc_ky + '&' + 'magv=' + id_giang_vien

    url = "https://ems.vlute.edu.vn/vTKBGiangVien/ViewTKBGV"

    payload = str_payload
    headers = {
    'Accept': 'text/html, */*; q=0.01',
    'Accept-Language': 'vi-VN,vi;q=0.9,en-US;q=0.8,en;q=0.7,fr-FR;q=0.6,fr;q=0.5',
    'Connection': 'keep-alive',
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8',
    'Cookie': '_eid=521124FEFEA42E7B-8585266706584596699; _ga_BMC2WVX2LC=GS1.1.1710666462.3.1.1710666593.0.0.0; _ga_KPBLK4LM5W=GS1.1.1712514395.16.1.1712514407.0.0.0; _ga_RLR7ET94ZP=GS1.1.1713536198.221.1.1713536227.0.0.0; _app=false; _gid=GA1.3.192239343.1713731805; .AspNetCore.Antiforgery.8AKzeFmrLRQ=CfDJ8ECh4CAu9bRHm79PM1pJIqCCO_x3LhX-IDI-JHgTJxKUnbFxx6icGFYqTeJ7P8YG-4jcDwz39r1dXbtOqrTFtFyd4XbWmgDzPSnLtfyr6ozZKEbilRslKRqADScHiHut5YNWnica600y4X5tRNEeBVo; emsid=flaOr5g95IZFqpC726pn46Jch_su1oXeQSc3UzyPgL3g5Iofj44yqjbwIZbr4i1j-8584877241329954665; vtkbsv=0; _ga=GA1.1.779896374.1713731805; _ga_VWKTCL2NH0=GS1.1.1713898831.8.1.1713898832.0.0.0; vtkbgv=2',
    'Origin': 'https://ems.vlute.edu.vn',
    'Referer': 'https://ems.vlute.edu.vn/vTKBGiangVien',
    'Sec-Fetch-Dest': 'empty',
    'Sec-Fetch-Mode': 'cors',
    'Sec-Fetch-Site': 'same-origin',
    'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',
    'X-Requested-With': 'XMLHttpRequest',
    'sec-ch-ua': '"Chromium";v="124", "Google Chrome";v="124", "Not-A.Brand";v="99"',
    'sec-ch-ua-mobile': '?0',
    'sec-ch-ua-platform': '"Windows"'
    }

    response = requests.request("POST", url, headers=headers, data=payload)

    # print(response.text)

    html_content = response.text

    # Tạo đối tượng BeautifulSoup
    soup = BeautifulSoup(html_content, 'html.parser')

    tab_12 = soup.find('div', {'id': 'tab_12'})
    data_days = []
    all_data = []
    if tab_12:
            data_rows = tab_12.find_all('tr')
            for row in data_rows[1:]:
                cells = row.find_all('td')
                day = cells[0].get_text(strip=True)

                detail = cells[1].get_text(separator='|', strip=True)
                detail = detail.replace('|', '')

                # Xử lý chuỗi chi tiết
                details_split = re.split(r'(?<=sv\))|(?<=\d\))|(?=GV:)|(?=Phòng:)|(?=Tuần học:)|(?=Ngày học:)', detail)
                details_clean = [re.sub(r'\s+', ' ', part).strip() for part in details_split if part.strip()]
                formatted_details = ', '.join(details_clean)
                data_details = []
                data_details.append(day)
                for item in details_clean:
                    if item not in data_details:
                        data_details.append(item)
                all_data.append(data_details)
    #         print(data_details)
    else:
        print("Không tìm thấy phần tử với id 'tab_12'")


    try:
        for detail in all_data:
            if len(detail) > 1:  # Kiểm tra chi tiết xem có đủ thông tin không
                    ma_hoc_phan = detail[1]
                    # Kiểm tra xem mã học phần đã tồn tại chưa
                    cursor.execute("SELECT 1 FROM data_crawl_from_vlute_ems WHERE ma_hoc_phan = %s", (ma_hoc_phan,))
                    exists = cursor.fetchone()
                    switcher = {
                        "Ngoài giờ học": 1,
                        "Thứ 2": 2,
                        "Thứ 3": 3,
                        "Thứ 4": 4,
                        "Thứ 5": 5,
                        "Thứ 6": 6,
                        "Thứ 7": 7,
                        "Chủ nhật": 8,
                    }
                    key_thu = (switcher.get(detail[0], 1))
                    if not exists:  # Chỉ insert nếu mã học phần chưa tồn tại

                        insert_query = """INSERT INTO data_crawl_from_vlute_ems (thu,key_thu, ma_hoc_phan, ten_hoc_phan, giang_vien, phong, tuan_hoc, ngay_hoc, id_giang_vien, id_hoc_ky)
                                        VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)"""
                        thu = detail[0]
                        ten_hoc_phan = detail[2] if len(detail) > 2 else None
                        giang_vien = detail[3] if len(detail) > 3 else None
                        phong = detail[4] if len(detail) > 4 else None
                        tuan_hoc = detail[5] if len(detail) > 5 else None
                        ngay_hoc = detail[6] if len(detail) > 6 else None
                        cursor.execute(insert_query, (thu, key_thu, ma_hoc_phan, ten_hoc_phan, giang_vien, phong, tuan_hoc, ngay_hoc, id_giang_vien, id_hoc_ky))

        # Xóa tất cả dữ liệu từ bảng crawl
        delete_query = "DELETE FROM crawl"
        cursor.execute(delete_query)

        # Commit thay đổi
        conn.commit()
        cursor.close()
        print('thanhcong')
    except mysql.connector.Error as err:
        print("Lỗi MySQL:", err)

    except requests.RequestException as req_err:
        print("Lỗi khi gửi yêu cầu tới API:", req_err)

    except Exception as e:
        print("Đã xảy ra lỗi:", e)

