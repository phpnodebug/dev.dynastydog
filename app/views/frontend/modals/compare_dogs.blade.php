@if ( ! is_null($dogComparisonResults = Session::get('dogComparisonResults')) and ! is_null($characteristic = Session::get('characteristic')))
<div class="modal fade" id="kennel-dog-compare-results-modal" tabindex="-1" role="dialog" aria-labelledby="kennel-dog-compare-results-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="kennel-dog-compare-results-modal-label">Comparison Results</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Characteristic</label>
                        <div class="col-sm-9">
                            <p class="form-control-static">{{ $characteristic->name }}</p>
                        </div>
                    </div>
                </div>

                <table class="table table-striped table-responsive">
                    <thead>
                        <tr>
                            <th class="col-xs-6">Dog</th>
                            <th class="col-xs-6">Results</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dogComparisonResults as $result)
                        <tr>
                            <td class="col-md-5">{{ $result['dog']->linkedNameplate() }}</td>
                            <td>
                                @if(strlen($result['data']))
                                {{ $result['data'] }}
                                @elseif($characteristic->hasTest() and ! $characteristic->hasEmpiricalTest())
                                <em>Has not been tested</em>
                                @else
                                <em>Unknown</em>
                                @endif
                            </td>
                        </tr>
                        @endforeach

                        @if(empty($dogComparisonResults))
                        <tr>
                            <td colspan="3">No dogs had information compared.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
    $('#kennel-dog-compare-results-modal').modal('show');
});
</script>
@endif