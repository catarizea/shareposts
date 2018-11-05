<?php require APPROOT.'/views/inc/header.php'; ?>
  <a href="<?php echo URLROOT.'/posts' ?>" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
  <div class="card card-body bg-light mt-4">
    <h2>Edit post</h2>
    <p>Modify a post with this form</p>
    <form action="<?php echo URLROOT.'/posts/edit/'.$data['id']; ?>" method="POST">
      <div class="form-group">
        <label for="name">Title: <sup>*</sup></label>
        <input type="text" class="form-control form-control-lg <?php echo(!empty($data['title_error']) ? 'is-invalid' : ''); ?>" value="<?php echo $data['title']; ?>" name="title">
        <span class="invalid-feedback"><?php echo $data['title_error']; ?></span>
      </div>
      <div class="form-group">
        <label for="name">Body: <sup>*</sup></label>
        <textarea class="form-control form-control-lg <?php echo(!empty($data['body_error']) ? 'is-invalid' : ''); ?>" name="body"><?php echo $data['body']; ?></textarea>
        <span class="invalid-feedback"><?php echo $data['body_error']; ?></span>
      </div>
      
      <input type="submit" class="btn btn-success" value="Save">
    </form>
  </div>
<?php require APPROOT.'/views/inc/footer.php'; ?>