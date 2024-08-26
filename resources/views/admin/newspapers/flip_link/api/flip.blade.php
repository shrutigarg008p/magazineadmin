    	 @if($newsDatas->file_type == "pdf")    	
         <?php echo URL::to('/')."/api/customer/newspapers/flip_pdf/".$newsDatas->id ?>
     @else
    	<h1>Epub</h1>
    	@endif

    