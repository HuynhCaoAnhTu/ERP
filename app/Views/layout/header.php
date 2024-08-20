<!DOCTYPE html>
<html lang="en" style="font-size:0.875em">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= lang("App.appname") ?> - <?= esc($sitetitle) ?></title>
  <meta name="description" content="ERP Travel">
  <meta name="keyword" content="travel,erp,tour,hotel, villa, ticket">
  <meta name="author" content="vietnamsic.com tourdulichhot.com">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?= csrf_meta() ?>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url('asset/plugins/fontawesome-free/css/all.min.css') ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url('asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('asset/css/adminlte.min.css') ?>">
  <!--<link rel="stylesheet" href="<?php /* echo base_url('asset/css/rtl/adminlte.rtl.min.css') */ ?>"> -->

  <!-- SweetAlert2 Bootstrap or Dark -->
  <link rel="stylesheet" href="<?= base_url('asset/css/sweetalert2-dark.min.css') ?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('asset/plugins/datatables/DataTables-1.11.3/css/dataTables.bootstrap5.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('asset/plugins/datatables/Responsive-2.2.9/css/responsive.bootstrap5.min.css'); ?>">

  <link rel="stylesheet" href="<?= base_url('asset/plugins/datatables/StateRestore-1.1.1/css/stateRestore.bootstrap5.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('asset/css/select2.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('asset/css/summernote.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('asset/css/upload_file.css') ?>">
  <link rel="stylesheet" href="<?= base_url('asset/css/index.css') ?>">
  <!-- Summernote CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote.min.css" rel="stylesheet">


  <!-- Dark style -->
  <!--<link rel="stylesheet" href="<?php /* echo base_url('asset/css/dark/adminlte-dark-addon.min.css')*/ ?>">  -->

  <style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    /* Firefox */
    input[type=number] {
      -moz-appearance: textfield;
    }
  </style>
</head>