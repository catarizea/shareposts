<?php require APPROOT.'/views/inc/header.php'; ?>
  <div class="row">
    <div class="col-md-6 mb-3">
      <h1>Posts</h1>
    </div>
    <div class="col-md-6">
      <a href="<?php echo URLROOT.'/posts/add' ?>" class="btn btn-primary pull-right"><i class="fa fa-pencil"></i> Add post</a>
    </div>
  </div>
  <?php foreach($data['posts'] as $post) : ?>
  <div class="card card-body mb-3">
    <h4 class="card-title">
      <?php echo $post->title; ?>
    </h4>
    <div class="bg-light p-2 mb3">
      written by <?php echo $post->name; ?> on <?php echo $post->postCreatedAt; ?>
    </div>
    <p class="card-text pt-3">
      <?php echo $post->body; ?>
    </p>
    <a href="<?php echo URLROOT.'/posts/show/'.$post->postId; ?>" class="btn btn-dark">More</a>
  </div>
<?php endforeach ?>
<?php require APPROOT.'/views/inc/footer.php'; ?>