<div class="col-md-8">
    <p style="text-align:center"><h2>Click on the link below to download project</h2></p>
    
    <hr>
    <?php  $link = '/download/' . $project->file_name ?>
    <div>
        <span>
        <p style="text-align:center">
            <a href="{{ url($link)  }}" target="_blank"> {{$project->title}}</a>
        </p>
        </span>
    </div>
</div>