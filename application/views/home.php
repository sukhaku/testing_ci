 

<?php if($this->session->flashdata('messages')){?>
  <div class="alert alert-success">      
    <?php echo $this->session->flashdata('message')?>
  </div>
<?php } ?>

<h1>Start to Inject</h1><br><a class=button>Secure your Apps</a>