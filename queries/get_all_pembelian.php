<?php
/**
 * Created by PhpStorm.
 * User: ibalmard
 * Date: 31/12/2017
 * Time: 17.03
 */
header("Content-Type: application/json; charset=UTF-8");

header("Content-Type: application/json; charset=UTF-8");

require "../config/db.php";
$currentYear = date('Y');
$data = [];
$sql = "SELECT COUNT(0) as total, sum((
    case when (tgl_transaksi_keluar BETWEEN '$currentYear-01-01' and '$currentYear-01-31') then total_transaksi_keluar else 0 end)) as totalJanuari,
    sum((
    case when (tgl_transaksi_keluar BETWEEN '$currentYear-02-01' and '$currentYear-02-31') then total_transaksi_keluar else 0 end)) as totalFebruari,
    sum((
    case when (tgl_transaksi_keluar BETWEEN '$currentYear-03-01' and '$currentYear-03-31') then total_transaksi_keluar else 0 end)) as totalMaret,
    sum((
    case when (tgl_transaksi_keluar BETWEEN '$currentYear-04-01' and '$currentYear-04-31') then total_transaksi_keluar else 0 end)) as totalApril,
    sum((
    case when (tgl_transaksi_keluar BETWEEN '$currentYear-05-01' and '$currentYear-05-31') then total_transaksi_keluar else 0 end)) as totalMei,
    sum((
    case when (tgl_transaksi_keluar BETWEEN '$currentYear-06-01' and '$currentYear-06-31') then total_transaksi_keluar else 0 end)) as totalJuni,
    sum((
    case when (tgl_transaksi_keluar BETWEEN '$currentYear-07-01' and '$currentYear-07-31') then total_transaksi_keluar else 0 end)) as totalJuli,
    sum((
    case when (tgl_transaksi_keluar BETWEEN '$currentYear-08-01' and '$currentYear-08-31') then total_transaksi_keluar else 0 end)) as totalAgustus,
    sum((
    case when (tgl_transaksi_keluar BETWEEN '$currentYear-09-01' and '$currentYear-09-31') then total_transaksi_keluar else 0 end)) as totalSeptember,
    sum((
    case when (tgl_transaksi_keluar BETWEEN '$currentYear-10-01' and '$currentYear-10-31') then total_transaksi_keluar else 0 end)) as totalOktober,
    sum((
    case when (tgl_transaksi_keluar BETWEEN '$currentYear-11-01' and '$currentYear-11-31') then total_transaksi_keluar else 0 end)) as totalNovember,
    sum((
    case when (tgl_transaksi_keluar BETWEEN '$currentYear-12-01' and '$currentYear-12-31') then total_transaksi_keluar else 0 end)) as totalDesember
    FROM transaksi_keluar";

$result = mysqli_query($dbConnection,$sql);

$row = mysqli_fetch_assoc($result);
$json[0] = $row;

echo json_encode($json);