
use CSDLass1
go
--III.	Viết các câu truy vấn sau:
--1.	Hiển thị tất cả thông tin có trong bảng khách hàng bao gồm tất cả các cột 
select *
from khachhang
--2.	Hiển thị thông tin từ bảng Sản phẩm gồm các cột: mã sản phẩm, tên sản phẩm, tổng tiền tồn kho. Với tổng tiền tồn kho = đơn giá* số lượng 
select masanpham,tensp,N'Tổng tiền tồn kho'=dongia*soluong
from sanpham
--3.	Hiển thị 10 khách hàng đầu tiên trong bảng khách hàng bao gồm các cột: mã khách hàng, họ và tên, email, số điện thoại 
select top 10 makh,hovatenlot+' '+ten,email,sdt
from khachhang

--4.	Hiển thị tất cả thông tin các cột của khách hàng có địa chỉ chứa chuỗi ‘Đà Nẵng’ 
select *
from khachhang
where diachi like N'Đà Nẵng'

--5.	Hiển thị danh sách các hoá hơn có trạng thái là chưa thanh toán và ngày mua hàng trong năm 2016 
select *
from hoadon
where trangthai like N'Chưa thanh toán'
and year (ngaymuahang) = 2016 
--6.	Hiển thị thông tin bảng HoaDon gồm các cột maHoaDon, ngayMuaHang, maKhachHang. Sắp xếp theo thứ tự giảm dần của ngayMuaHang
select mahoadon,ngaymuahang,makh
from hoadon
order by ngaymuahang desc
--7.	Hiển thị danh sách khách hàng có tên bắt đầu bởi kí tự ‘H’ gồm các cột: maKhachHang, hoVaTen, diaChi. Trong đó cột hoVaTen ghép từ 2 cột hoVaTenLot và Ten 
select makh,hovatenlot+' '+ten as N'Họ và tên' ,diachi as N'Địa chỉ'
from khachhang
where ten like 'H%'
--8.	Hiển thị các sản phẩm có số lượng nằm trong khoảng từ 100 đến 500. 
select *
from sanpham
where soluong >=100 and soluong <=500
--9.	Hiển thị các hoá đơn có mã Khách hàng thuộc 1 trong 3 mã sau: KH001, KH003, KH006
SELECT *
FROM hoadon
WHERE makh IN ('KH001', 'KH003', 'KH006');

--11.	Hiển thị số lượng khách hàng có trong bảng khách hàng 
select makh as N'Số lượng khách hàng'
from khachhang

--12.	Hiển thị đơn giá lớn nhất trong bảng SanPham 
select max (dongia) as N'giá trị lớn nhất '
from sanpham

--13.	Hiển thị số lượng sản phẩm thấp nhất trong bảng sản phẩm 
select min (dongia) as N'giá trị nhỏ nhất '
from sanpham

--14.	Hiển thị số hoá đơn đã xuất trong tháng 12/2016 mà có trạng thái chưa thanh toán 

select  count (mahoadon) as sohoadon
from hoadon 
where trangthai = N'Chưa thanh toán' 
and year (ngaymuahang)=2016 
and month (ngaymuahang) =12

--15.	Hiển thị mã hoá đơn và số loại sản phẩm được mua trong từng hoá đơn. 

select mahoadon, count (masanpham) as soloaisanpham
from hoadonchitiet
group by mahoadon


--16.	Hiển thị mã hoá đơn và số loại sản phẩm được mua trong từng hoá đơn. Yêu cầu chỉ hiển thị hàng nào có số loại sản phẩm được mua >=5 
select mahoadon, count (masanpham) as soloaisanpham
from hoadonchitiet
group by mahoadon
having count (masanpham) >=5

--17.	Cho biết thông tin các khách hàng Họ Lê có địa chỉ ở Hà nội
select *
from khachhang
where hovatenlot like N'lê%'
and diachi like N'Hà Nội'

--18.	Cho biết thông tin các khách hàng tên là Hương, có địa chỉ ở Hà Nội
select *
from khachhang
where ten like N'Hương'
and diachi like N'Hà Nội'

--19.	cho biết tổng số loại sản phẩm của mỗi hóa đơn: MaHoaDon, Tổng số sản phẩm.
SELECT MaHoaDon, COUNT(DISTINCT masanpham) AS [Tổng số sản phẩm]
FROM hoadonchitiet
GROUP BY MaHoaDon;


--20.	Cho biết tổng số đơn hàng bán được trong ngày 15/3/2022
select count (*) as N'Tổng số hóa đơn bán được trong ngày 15/3/2022'
from hoadon
where year (ngaymuahang)=2022
and month (ngaymuahang) =3
and day (ngaymuahang)=15

--21.	cho biết tổng số lần mua hàng của khách hàng: MaKhachHang, tổng số lần mua hàng
SELECT MaKh, COUNT(*) AS [Tổng số lần mua hàng]
FROM hoadon
GROUP BY MaKh;

--22.	cho biết tổng số lần mua hàng của khách hàng: MaKhachHang, tổng số lần mua hàng. Sắp giảm dần theo tổng số lần mua hàng
SELECT MaKh, COUNT(*) AS [Tổng số lần mua hàng]
FROM hoadon
GROUP BY MaKh
ORDER BY COUNT(*) DESC;

--23.	cho biết tổng số lần mua hàng của khách hàng: MaKhachHang, tổng số lần mua hàng. Chỉ đưa ra những khách hàng có số lần mua >2

SELECT MaKh, COUNT(*) AS [Tổng số lần mua hàng]
FROM hoadon
GROUP BY MaKh
HAVING COUNT(*) > 2;



