    	 @if($magDatas->file_type == "pdf")    	
         <?php echo URL::to('/')."/api/customer/magazines/flip_pdf/".$magDatas->id ?>
     @else
    	<h1>Epub</h1>
    	@endif

    