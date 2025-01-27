<!-- Content wrapper -->
<div class="content-wrapper">
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Help /</span> Blog</h4>

  <hr class="my-5" />

  <!-- Striped Rows -->
  <div class="card">
    <h5 class="card-header"><a class="btn btn-primary btn-sm btn-block" href="<?php echo base_url('agent/blog/add')?>">Add Post +</a></h5>
    <div class="table-responsive text-nowrap">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Img</th>
            <th>Title</th>
            <th>Category</th>
            <th>Alt Img</th>
            <th>Meta Title</th>
            <th>Meta Desc</th>
            <th>Meta Robot</th>
            <th>Url</th>
            <th>Update Date</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
        <?php
        $json = json_encode($list_blog); 
        $json_decoded = json_decode($json); 
        foreach($json_decoded as $row){ ?>
          <tr>
            <td><img src="<?php echo $row->imageurl;?>" height="20px" width="20px"></td>
            <td>
              <a href="<?php echo base_url('agent/blog/detail')?>/<?php echo $row->id;?>">
                <strong>#<?php echo $row->title_blog;?> <span class="badge rounded-pill <?php echo $row->status_badges;?>"><?php echo $row->status_desc;?></span><span class="badge rounded-pill <?php echo $row->top_desc_badges;?>"><?php echo $row->top_desc;?></span></strong>
                <br/>
                <?php echo $row->create_date;?>

              </a>
            </td>
            <td><span class="badge rounded-pill <?php echo $row->category_badges;?>"><?php echo $row->category;?></span></td>
            <td><?php echo $row->alt_img;?></td>
            <td><?php echo $row->meta_title;?></td>
            <td><?php echo $row->meta_desc;?></td>
            <td><?php echo $row->meta_robot;?></td>
            <td><?php echo $row->urldownload;?></td>
            <td><?php echo $row->update_date;?></td>
          </tr>
        <?php }?>
        </tbody>
      </table>
    </div>
  </div>
  <!--/ Striped Rows -->

  <hr class="my-5" />

</div>
<!-- / Content -->

