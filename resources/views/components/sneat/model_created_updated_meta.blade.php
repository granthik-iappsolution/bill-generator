<div class="row">
    <div class="col-md-3">
        <small>
            <strong>Created by, </strong> {{ $model->createdBy->name ?? 'NA' }}
        </small>
    </div>
    <div class="col-md-3">
        <small>
            <strong>Created at, </strong> {{ $model->created_at->toDayDateTimeString() }}
        </small>
    </div>
    <div class="col-md-3">
        <small>
            <strong>Updated by, </strong> {{ $model->updatedBy->name ?? 'NA' }}
        </small>
    </div>
    <div class="col-md-3">
        <small>
            <strong>Updated at, </strong> {{ $model->updated_at->toDayDateTimeString() }}
        </small>
    </div>
</div>
