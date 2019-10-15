<?php

//echo "<pre>"; print_r($post_data);
?>
@extends('layouts.app')

@section('content')
        
<div class="container">
    <div class="card-header">Dashboard</div>
   <?php foreach($post_data as $value) {  ?>
    
    <div class="row">        
        <div class="col-md-3">{{  $value->post_title }}</div>
        <div class="col-md-6">{{  $value->post_description }}</div>
        <div class="col-md-3"> <a href="edit/{{ $value->id }}"> Edit</a></div>
    </div>
    <?php } ?>
</div>

@endsection