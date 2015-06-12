<div id="list_model" class="panel panel-primary">
    <input type="hidden" id="list_type" value="model">
    <div class="panel-heading">
        List of models
    </div>
    <?php if (count($data) == 0): ?>
        <div class="panel-body">No results</div>
    <?php else: ?>
        <table id="table_model" class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Label</th>
                    <th>Created at</th>
                    <th>File</th>
                    <th>Active?</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['label'] ?></td>
                        <td><?= date('M jS Y gA', strtotime($row['created_at'])) ?></td>
                        <td class="file_view"><a href="#"><?= $row['filename'] ?></a></td>
                        <td>
                            <span class="glyphicon glyphicon-<?= $row['status'] ? 'ok status_ok' : 'remove status_ko' ?>" 
                                aria-hidden="true">
                            </span>
                        </td>
                        <td>
                            <a class="list_action action_edit btn btn-default" role="button" title="edit" href="<?= 
                                $app->urlFor('edit', array('type' => 'model', 'id' => $row['id'])) ?>">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            </a>
                            <a class="list_action action_edit btn btn-default" role="button" title="delete" href="#" 
                                data-toggle="modal" data-target="#list_delete_<?= $row['id'] ?>">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </a>
                            <div class="modal fade" id="list_delete_<?= $row['id'] ?>" tabindex="-1" role="dialog" 
                                aria-labelledby="list_delete_label_<?= $row['id'] ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="list_delete_label_<?= $row['id'] ?>">
                                                Are you sure to delete the model?
                                            </h4>
                                        </div>
                                        <div class="modal-body">
                                            This action <strong>CANNOT</strong> be undone at the application level.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <form class="list_action" method="post" action="<?= 
                                                $app->urlFor('delete', array('type' => 'model', 'id' => $row['id'])) ?>">
                                                <input type="hidden" name="_METHOD" value="DELETE">
                                                <button class="btn btn-danger" title="delete">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <div class="panel-footer">
            <span>
                <strong><?= $metadata['nb'] ?></strong>
                &nbsp;result<?= $metadata['nb'] == 1 ? '' : 's' ?>
            </span>
        </div>
    <?php endif ?>
</div>

<?php include 'list_modal.php'; ?>
