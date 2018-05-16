<div class="form-group row">
          <label for="pagename" class="col-sm-2 col-form-label">Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="pagename" placeholder="page title" name="pagename" value="<?php echo mysqlPrepare($row['forumPageName']); ?>"<?php echo editableForm(); ?>>
          </div>
        </div>
        <div class="form-group row">
          <label for="content" class="col-sm-2 col-form-label">Description</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="content"  name="content" value="<?php echo mysqlPrepare($row['forumPageContent']); ?>"<?php echo editableForm(); ?>>
          </div>
        </div>
        <?php echo editSubmitButtonSwitch();?> 
        <input class='btn btn-primary btn-block' type='submit' name='delete' value='delete page'>
      </form>