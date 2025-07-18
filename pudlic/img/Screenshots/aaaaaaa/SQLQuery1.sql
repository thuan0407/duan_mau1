create database CSDLass1
go
use CSDLass1
go

create table khachhang
(
makh nvarchar (5) not null,
hovatenlot nvarchar (50) not null,
ten nvarchar (50) not null,
diachi nvarchar (50) not null,
email nvarchar (50) not null,
sdt nvarchar (10) null,
primary key (makh)
)
go

create table hoadon 
(
mahoadon nvarchar (5) not null,
ngaymuahang date not null,
makh nvarchar (5) not null,
trangthai nvarchar (50) not null,
primary key (mahoadon),
foreign key (makh) references khachhang (makh)
)
go

create table sanpham 
(
masanpham nvarchar (5) not null,
mota nvarchar (50) not null,
soluong int not null,
dongia money not null,
tensp nvarchar (50) not null,
primary key (masanpham)

)
go

create table hoadonchitiet
(
mahoadonchitiet nvarchar (5) not null,
masanpham nvarchar (5) not null,
soluong int null,
mahoadon nvarchar (5) not null,
primary key (mahoadonchitiet),
foreign key (masanpham) references sanpham (masanpham),
foreign key (mahoadon) references hoadon (mahoadon)

)
go



insert into khachhang (makh,hovatenlot,ten,diachi,email,sdt)
values ('KH001',N'Hoàng Như ',N'Thuần',N'Hà Tây','thuan0407@gmail.com','034263601')
insert into khachhang (makh,hovatenlot,ten,diachi,email,sdt)
values ('KH002',N'Trần Công ',N'Minh',N'Tuyên Quang','minh0707@gmail.com','036563986')
insert into khachhang (makh,hovatenlot,ten,diachi,email,sdt)
values ('KH003',N'Nguyễn Thành ',N'Công',N'Hà Tây','cong0787@gmail.com','0659875698')
insert into khachhang (makh,hovatenlot,ten,diachi,email,sdt)
values ('KH004',N'Nguyễn Văn ',N'Hà',N'Hà Nam','ha50789@gmail.com','0269859863')
insert into khachhang (makh,hovatenlot,ten,diachi,email,sdt)
values ('KH005',N'Bùi Ngọc',N'Ánh',N'Hòa Bình','anh0597@gmail.com','0365987456')
insert into khachhang (makh,hovatenlot,ten,diachi,email,sdt)
values ('KH006',N'Nguyễn Thành ',N'Ninh',N'Thanh Hóa','ninh0787@gmail.com','0986574698')
insert into khachhang (makh,hovatenlot,ten,diachi,email,sdt)
values ('KH007',N'Phạm Minh ',N'Khánh',N'Hà Tây','khanh045887@gmail.com','0696375698')
insert into khachhang (makh,hovatenlot,ten,diachi,email,sdt)
values ('KH008',N'Ngyễn văn ',N'Khánh',N'Hà Tây','khanh045887@gmail.com','0693585698')
insert into khachhang (makh,hovatenlot,ten,diachi,email,sdt)
values ('KH099',N'Phạm Minh ',N'Hùng',N'Hà Tây','hung2567@gmail.com','0269856324')
insert into khachhang (makh,hovatenlot,ten,diachi,email,sdt)
values ('KH098',N'Nguyễn Trọng ',N'Nam',N'TP.HCM','trong32659@gmail.com','0369856214')

go





insert into hoadon(mahoadon,makh,ngaymuahang,trangthai)
values ('AA11','KH001','2016/12/5',N'Đã thanh toán')
insert into hoadon(mahoadon,makh,ngaymuahang,trangthai)
values ('AA12','KH002','2016/12/5',N'Đã thanh toán')
insert into hoadon(mahoadon,makh,ngaymuahang,trangthai)
values ('AA13','KH003','2016/12/5',N'Đã thanh toán')
insert into hoadon(mahoadon,makh,ngaymuahang,trangthai)
values ('AA14','KH004','2016/9/15',N'Đã thanh toán')
insert into hoadon(mahoadon,makh,ngaymuahang,trangthai)
values ('AA15','KH005','2016/9/14',N'Đã thanh toán')
insert into hoadon(mahoadon,makh,ngaymuahang,trangthai)
values ('AA16','KH006','2016/9/14',N'Đã thanh toán')
insert into hoadon(mahoadon,makh,ngaymuahang,trangthai)
values ('AA17','KH007','2016/9/14',N'Chưa thanh toán')
insert into hoadon(mahoadon,makh,ngaymuahang,trangthai)
values ('AA18','KH008','2016/8/22',N'Chưa thanh toán')
insert into hoadon(mahoadon,makh,ngaymuahang,trangthai)
values ('AA19','KH099','2016/9/14',N'Chưa thanh toán')
insert into hoadon(mahoadon,makh,ngaymuahang,trangthai)
values ('AA120','KH098','2016/9/14',N'Chưa thanh toán')

go




insert into sanpham(masanpham,dongia,mota,soluong,tensp)
values ('bb11',10000,N'Dùng để làm mát ',20,N'Quạt điện ')
insert into sanpham(masanpham,dongia,mota,soluong,tensp)
values ('bb12',5000,N'Thắp sáng',20,N'Bóng đèn ')
insert into sanpham(masanpham,dongia,mota,soluong,tensp)
values ('bb13',10000,N'Dùng để làm mát ',15,N'Quạt điện ')
insert into sanpham(masanpham,dongia,mota,soluong,tensp)
values ('bb14',5000,N'Dùng để làm mát ',20,N'Quạt điện ')
insert into sanpham(masanpham,dongia,mota,soluong,tensp)
values ('bb15',20000,N'Dùng trong lớp học ',101,N'Bàn ghế ')
insert into sanpham(masanpham,dongia,mota,soluong,tensp)
values ('bb16',1000000,N'Xem truyền hình ',5,N'Ti vi ')
insert into sanpham(masanpham,dongia,mota,soluong,tensp)
values ('bb17',50000,N'Dùng để làm mát ',5,N'Quạt điện ')
insert into sanpham(masanpham,dongia,mota,soluong,tensp)
values ('bb18',1000000,N'Dùng để làm mát ',2,N'Điều hòa ')
insert into sanpham(masanpham,dongia,mota,soluong,tensp)
values ('bb19',1000,N'Dùng để ăn ',50,N'mì gói')
insert into sanpham(masanpham,dongia,mota,soluong,tensp)
values ('bb20',7890,N'Dùng để làm mát ',3,N'Tất chân ')
 go

insert into hoadonchitiet(mahoadonchitiet,mahoadon,masanpham,soluong)
values ('cc11','aa11','bb11',20)
insert into hoadonchitiet(mahoadonchitiet,mahoadon,masanpham,soluong)
values ('cc12','aa12','bb12',20)
insert into hoadonchitiet(mahoadonchitiet,mahoadon,masanpham,soluong)
values ('cc13','aa12','bb11',6)
insert into hoadonchitiet(mahoadonchitiet,mahoadon,masanpham,soluong)
values ('cc14','aa14','bb16',5)
insert into hoadonchitiet(mahoadonchitiet,mahoadon,masanpham,soluong)
values ('cc15','aa19','bb20',3)
insert into hoadonchitiet(mahoadonchitiet,mahoadon,masanpham,soluong)
values ('cc16','aa120','bb20',3)
insert into hoadonchitiet(mahoadonchitiet,mahoadon,masanpham,soluong)
values ('cc17','aa18','bb13',15)
insert into hoadonchitiet(mahoadonchitiet,mahoadon,masanpham,soluong)
values ('cc18','aa16','bb17',5)
insert into hoadonchitiet(mahoadonchitiet,mahoadon,masanpham,soluong)
values ('cc19','aa15','bb19',50)
insert into hoadonchitiet(mahoadonchitiet,mahoadon,masanpham,soluong)
values ('cc20','aa17','bb11',20)

go