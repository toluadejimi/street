@extends($activeTemplate . 'layouts.app')
@section('panel')
    <div class="row justify-content-center">
        <div class="col-md-12">

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
            @endif
            @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
            @endif

            <div class="card b-dadius--10">
                <div class="card-body p-0">

                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th>@lang('Gateway | Transaction')</th>
                                    <th class="text-center">@lang('Initiated')</th>
                                    <th class="text-center">@lang('Amount')</th>
                                    <th class="text-center">@lang('Status')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse(@$deposits as $deposit)
                                    <tr>
                                        <td>
                                            <span class="fw-bold"> <span
                                                    class="text-primary">{{ __($deposit->gateway?->name) }}</span>
                                            </span>
                                            <br>
                                            <small> {{ $deposit->trx }} </small>
                                        </td>

                                        <td class="text-center">
                                            {{ showDateTime($deposit->created_at) }}<br>{{ diffForHumans($deposit->created_at) }}
                                        </td>
                                        <td class="text-center">
                                            {{ __($general->cur_sym) }}{{ showAmount($deposit->amount) }} + <span
                                                class="text--danger"
                                                title="@lang('charge')">{{ showAmount($deposit->charge) }} </span>
                                            <br>
                                            <strong title="@lang('Amount with charge')">
                                                {{ showAmount($deposit->amount + $deposit->charge) }}
                                                {{ __($general->cur_text) }}
                                            </strong>
                                        </td>

                                        <td class="text-center">
                                            @php echo $deposit->statusBadge @endphp
                                        </td>
                                        @php
                                            $details = $deposit->detail != null ? json_encode($deposit->detail) : null;
                                        @endphp


                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="100%" class="text-center">{{ __($emptyMessage) }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                @if ($deposits->hasPages())
                    <div class="card-footer">
                        {{ $deposits->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- APPROVE MODAL --}}
    <div id="detailModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Details')</h5>
                    <span type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </span>
                </div>
                <div class="modal-body">
                    <ul class="list-group userData mb-2">
                    </ul>
                    <div class="feedback"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn--dark btn-sm" data-bs-dismiss="modal">@lang('Close')</button>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('breadcrumb-plugins')
    <x-search-form placeholder="Search by Trx" />
    <a href="{{ route('user.deposit.index') }}" class="btn btn-outline--primary">
        <i class="las la-plus"></i>
        @lang('Fund Wallet Now')
    </a>
@endpush

{{-- @push('breadcrumb-plugins')
    <a href="https://streamable.com/9lv2o4" class="btn btn-warning">
        <i class="las la-cloud"></i>
        @lang('How to deposit')
    </a>
@endpush --}}





@push('script')
    <script>
        (function($) {
            "use strict";
            $('.detailBtn').on('click', function() {
                var modal = $('#detailModal');

                var userData = $(this).data('info');
                var html = '';
                if (userData) {
                    userData.forEach(element => {
                        if (element.type != 'file') {
                            html += `
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>${element.name}</span>
                                <span">${element.value}</span>
                            </li>`;
                        }
                    });
                }

                modal.find('.userData').html(html);

                if ($(this).data('admin_feedback') != undefined) {
                    var adminFeedback = `
                        <div class="my-3">
                            <strong>@lang('Admin Feedback')</strong>
                            <p>${$(this).data('admin_feedback')}</p>
                        </div>
                    `;
                } else {
                    var adminFeedback = '';
                }
                modal.find('.feedback').html(adminFeedback);
                modal.modal('show');
            });
        })(jQuery);
    </script>
@endpush
