@if ( ! is_null($massTestResults = Session::get('massTestResults')) and ! is_null($characteristicTest = Session::get('characteristicTest')))
<div class="modal fade" id="kennel-dog-test-results-modal" tabindex="-1" role="dialog" aria-labelledby="kennel-dog-test-results-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="kennel-dog-test-results-modal-label">Test Results</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Test</label>
                        <div class="col-sm-9">
                            <p class="form-control-static">{{ $characteristicTest->name }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Characteristic</label>
                        <div class="col-sm-9">
                            <p class="form-control-static">{{ $characteristicTest->characteristic->name }}</p>
                        </div>
                    </div>
                </div>

                <table class="table table-striped table-responsive">
                    <thead>
                        <tr>
                            <th class="col-xs-4">Dog</th>
                            <th class="col-xs-6">Results</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($massTestResults as $result)
                        <tr>
                            <td>{{ $result['dog']->linkedNameplate() }}</td>
                            <td>{{ $result['data'] }}</td>
                        </tr>
                        @endforeach

                        @if(empty($massTestResults))
                        <tr>
                            <td colspan="3">No dogs had information revealed from this test.</td>
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

<script type="text/javascript">$(document).ready(function(){$('#kennel-dog-test-results-modal').modal('show')})</script>
@endif