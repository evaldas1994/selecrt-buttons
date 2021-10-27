@extends('layouts.app')

@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto">
            <h1>@lang('modules/template.h1')</h1>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <a href="#" class="btn btn-primary"
               onclick="event.preventDefault();document.getElementById('template-form').submit();">@lang('global.btn_save')</a>
            <a href="{{ route('templates.index') }}" class="btn btn-dark">@lang('global.btn_close')</a>
        </div>
    </div>
    <div class="row">
        <div class="card">
            <form id="template-form" action="{{ route('templates.update', $template) }}" method="POST" class="d-flex flex-wrap">
                @csrf
                @method('PUT')

                <div class="col-12 col-xl-4">
                    <div class="card-body">
                        <div class="mb-2">
                            <label class="form-label">@lang('modules/template.f_id')</label>
                            <input type="text"
                                   class="not-empty form-control form-control-sm @error('f_id') is-invalid @enderror"
                                   name="f_id"
                                   id-pattern
                                   placeholder="@lang('modules/template.f_id')"
                                   required
                                   maxlength="20"
                                   value="{{ old('f_id', $template->f_id)}}">
                            @error('f_id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/template.f_op')</label>
                            <select class="form-control form-control-sm @error('f_op') is-invalid @enderror" name="f_op"
                                    value="{{ old('f_op') }}">
                                @foreach($operations as $operation)
                                    <option
                                        value="{{ $operation }}" {{ selected('f_op', $operation, $template->f_op) }}>@lang('modules/template.operation_type' . $operation)</option>
                                @endforeach
                            </select>
                            @error('f_op') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-check m-0">
                                <span class="form-check-label">@lang('modules/template.f_primary_document')</span>
                                <input type="hidden" name="f_primary_document" value="0">
                                <input type="checkbox" name="f_primary_document"
                                       class="form-check-input @error('f_primary_document') is-invalid @enderror"
                                       value="{{ old('f_primary_document', 1) }}" {{ old('f_primary_document', $template->f_primary_document) == 1 ? 'checked' : '' }}>
                            </label>
                            @error('f_primary_document') <span class="invalid-feedback"
                                                               role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-4">
                    <div class="card-body">

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/template.f_groupid')</label>
                            <select class="form-control form-control-sm @error('f_groupid') is-invalid @enderror"
                                    name="f_groupid">
                                <option value selected>---</option>
                                @foreach($stockOperationGroups as $group)
                                    <option
                                        value="{{ $group->f_id }}" {{ selected('f_groupid', $group->f_id, $template->f_groupid) }}>{{ $group->f_name }}</option>
                                @endforeach
                            </select>
                            @error('f_groupid') <span class="invalid-feedback"
                                                      role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">@lang('modules/template.f_name')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_name') is-invalid @enderror"
                                   name="f_name"
                                   placeholder="@lang('modules/template.f_name')"
                                   maxlength="100"
                                   value="{{ old('f_name', $template->f_name)}}">
                            @error('f_name') <span class="invalid-feedback"
                                                   role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-check m-0">
                                <span class="form-check-label">@lang('modules/template.f_consignment')</span>
                                <input type="hidden" name="f_consignment" value="0">
                                <input type="checkbox" name="f_consignment"
                                       class="form-check-input @error('f_consignment') is-invalid @enderror"
                                       value="{{ old('f_consignment', 1) }}" {{ old('f_consignment', $template->f_consignment) == 1 ? 'checked' : '' }}>
                            </label>
                            @error('f_consignment') <span class="invalid-feedback"
                                                          role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12  col-xl-8">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-sm">
                                        <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">@lang('modules/template.description')</th>
                                            <th scope="col">@lang('modules/template.debit')</th>
                                            <th scope="col">@lang('modules/template.credit')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>@lang('modules/template.title1')</td>
                                            <td>
                                                <div class="mb-2">
                                                    <input type="text"
                                                           class="form-control form-control-sm @error('f_description1') is-invalid @enderror"
                                                           name="f_description1"
                                                           placeholder="@lang('modules/template.description')"
                                                           maxlength="100"
                                                           value="{{ old('f_description1', $template->f_description1)}}">
                                                    @error('f_description1') <span class="invalid-feedback"
                                                                                   role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-2">
                                                    <select
                                                        class="form-control form-control-sm @error('f_deb_account1') is-invalid @enderror"
                                                        name="f_deb_account1">
                                                        <option value selected>---</option>
                                                        @foreach($accounts as $account)
                                                            <option
                                                                value="{{ $account->f_id }}" {{ selected('f_deb_account1', $account->f_id, $template->f_deb_account1) }}>{{ $account->f_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('f_deb_account1') <span class="invalid-feedback"
                                                                                   role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-2">
                                                    <select
                                                        class="form-control form-control-sm @error('f_cred_account1') is-invalid @enderror"
                                                        name="f_cred_account1">
                                                        <option value selected>---</option>
                                                        @foreach($accounts as $account)
                                                            <option
                                                                value="{{ $account->f_id }}" {{ selected('f_cred_account1', $account->f_id, $template->f_cred_account1) }}>{{ $account->f_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('f_cred_account1') <span class="invalid-feedback"
                                                                                    role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>@lang('modules/template.title2')</td>
                                            <td>
                                                <div class="mb-2">
                                                    <input type="text"
                                                           class="form-control form-control-sm @error('f_description2') is-invalid @enderror"
                                                           name="f_description2"
                                                           placeholder="@lang('modules/template.description')"
                                                           maxlength="100"
                                                           value="{{ old('f_description2', $template->f_description2)}}">
                                                    @error('f_description2') <span class="invalid-feedback"
                                                                                   role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-2">
                                                    <select
                                                        class="form-control form-control-sm @error('f_deb_account2') is-invalid @enderror"
                                                        name="f_deb_account2">
                                                        <option value selected>---</option>
                                                        @foreach($accounts as $account)
                                                            <option
                                                                value="{{ $account->f_id }}" {{ selected('f_deb_account2', $account->f_id, $template->f_deb_account2) }}>{{ $account->f_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('f_deb_account2') <span class="invalid-feedback"
                                                                                   role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-2">
                                                    <select
                                                        class="form-control form-control-sm @error('f_cred_account2') is-invalid @enderror"
                                                        name="f_cred_account2">
                                                        <option value selected>---</option>
                                                        @foreach($accounts as $account)
                                                            <option
                                                                value="{{ $account->f_id }}" {{ selected('f_cred_account2', $account->f_id, $template->f_cred_account2) }}>{{ $account->f_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('f_cred_account2') <span class="invalid-feedback"
                                                                                    role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>@lang('modules/template.title3')</td>
                                            <td>
                                                <div class="mb-2">
                                                    <input type="text"
                                                           class="form-control form-control-sm @error('f_description3') is-invalid @enderror"
                                                           name="f_description3"
                                                           placeholder="@lang('modules/template.description')"
                                                           maxlength="100"
                                                           value="{{ old('f_description3', $template->f_description3)}}">
                                                    @error('f_description3') <span class="invalid-feedback"
                                                                                   role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-2">
                                                    <select
                                                        class="form-control form-control-sm @error('f_deb_account3') is-invalid @enderror"
                                                        name="f_deb_account3">
                                                        <option value selected>---</option>
                                                        @foreach($accounts as $account)
                                                            <option
                                                                value="{{ $account->f_id }}" {{ selected('f_deb_account3', $account->f_id, $template->f_deb_account3) }}>{{ $account->f_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('f_deb_account3') <span class="invalid-feedback"
                                                                                   role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-2">
                                                    <select
                                                        class="form-control form-control-sm @error('f_cred_account3') is-invalid @enderror"
                                                        name="f_cred_account3">
                                                        <option value selected>---</option>
                                                        @foreach($accounts as $account)
                                                            <option
                                                                value="{{ $account->f_id }}" {{ selected('f_cred_account3', $account->f_id, $template->f_cred_account3) }}>{{ $account->f_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('f_cred_account3') <span class="invalid-feedback"
                                                                                    role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>@lang('modules/template.title16')</td>
                                            <td>
                                                <div class="mb-2">
                                                    <input type="text"
                                                           class="form-control form-control-sm @error('f_description16') is-invalid @enderror"
                                                           name="f_description16"
                                                           placeholder="@lang('modules/template.description')"
                                                           maxlength="100"
                                                           value="{{ old('f_description16', $template->f_description16)}}">
                                                    @error('f_description16') <span class="invalid-feedback"
                                                                                    role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-2">
                                                    <select
                                                        class="form-control form-control-sm @error('f_deb_account16') is-invalid @enderror"
                                                        name="f_deb_account16">
                                                        <option value selected>---</option>
                                                        @foreach($accounts as $account)
                                                            <option
                                                                value="{{ $account->f_id }}" {{ selected('f_deb_account16', $account->f_id, $template->f_deb_account16) }}>{{ $account->f_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('f_deb_account16') <span class="invalid-feedback"
                                                                                    role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-2">
                                                    <select
                                                        class="form-control form-control-sm @error('f_cred_account16') is-invalid @enderror"
                                                        name="f_cred_account16">
                                                        <option value selected>---</option>
                                                        @foreach($accounts as $account)
                                                            <option
                                                                value="{{ $account->f_id }}" {{ selected('f_cred_account16', $account->f_id, $template->f_cred_account16) }}>{{ $account->f_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('f_cred_account16') <span class="invalid-feedback"
                                                                                     role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>@lang('modules/template.title4')</td>
                                            <td>
                                                <div class="mb-2">
                                                    <input type="text"
                                                           class="form-control form-control-sm @error('f_description4') is-invalid @enderror"
                                                           name="f_description4"
                                                           placeholder="@lang('modules/template.description')"
                                                           maxlength="100"
                                                           value="{{ old('f_description4', $template->f_description4)}}">
                                                    @error('f_description4') <span class="invalid-feedback"
                                                                                   role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-2">
                                                    <select
                                                        class="form-control form-control-sm @error('f_deb_account4') is-invalid @enderror"
                                                        name="f_deb_account4">
                                                        <option value selected>---</option>
                                                        @foreach($accounts as $account)
                                                            <option
                                                                value="{{ $account->f_id }}" {{ selected('f_deb_account4', $account->f_id, $template->f_deb_account4) }}>{{ $account->f_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('f_deb_account4') <span class="invalid-feedback"
                                                                                   role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-2">
                                                    <select
                                                        class="form-control form-control-sm @error('f_cred_account4') is-invalid @enderror"
                                                        name="f_cred_account4">
                                                        <option value selected>---</option>
                                                        @foreach($accounts as $account)
                                                            <option
                                                                value="{{ $account->f_id }}" {{ selected('f_cred_account4', $account->f_id, $template->f_cred_account4) }}>{{ $account->f_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('f_cred_account4') <span class="invalid-feedback"
                                                                                    role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>@lang('modules/template.title5')</td>
                                            <td>
                                                <div class="mb-2">
                                                    <input type="text"
                                                           class="form-control form-control-sm @error('f_description5') is-invalid @enderror"
                                                           name="f_description5"
                                                           placeholder="@lang('modules/template.description')"
                                                           maxlength="100"
                                                           value="{{ old('f_description5', $template->f_description5)}}">
                                                    @error('f_description5') <span class="invalid-feedback"
                                                                                   role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-2">
                                                    <select
                                                        class="form-control form-control-sm @error('f_deb_account5') is-invalid @enderror"
                                                        name="f_deb_account5">
                                                        <option value selected>---</option>
                                                        @foreach($accounts as $account)
                                                            <option
                                                                value="{{ $account->f_id }}" {{ selected('f_deb_account5', $account->f_id, $template->f_deb_account5) }}>{{ $account->f_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('f_deb_account5') <span class="invalid-feedback"
                                                                                   role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-2">
                                                    <select
                                                        class="form-control form-control-sm @error('f_cred_account5') is-invalid @enderror"
                                                        name="f_cred_account5">
                                                        <option value selected>---</option>
                                                        @foreach($accounts as $account)
                                                            <option
                                                                value="{{ $account->f_id }}" {{ selected('f_cred_account5', $account->f_id, $template->f_cred_account5) }}>{{ $account->f_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('f_cred_account5') <span class="invalid-feedback"
                                                                                    role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>@lang('modules/template.title6')</td>
                                            <td>
                                                <div class="mb-2">
                                                    <input type="text"
                                                           class="form-control form-control-sm @error('f_description6') is-invalid @enderror"
                                                           name="f_description6"
                                                           placeholder="@lang('modules/template.description')"
                                                           maxlength="100"
                                                           value="{{ old('f_description6', $template->f_description6)}}">
                                                    @error('f_description6') <span class="invalid-feedback"
                                                                                   role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-2">
                                                    <select
                                                        class="form-control form-control-sm @error('f_deb_account6') is-invalid @enderror"
                                                        name="f_deb_account6">
                                                        <option value selected>---</option>
                                                        @foreach($accounts as $account)
                                                            <option
                                                                value="{{ $account->f_id }}" {{ selected('f_deb_account6', $account->f_id, $template->f_deb_account6) }}>{{ $account->f_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('f_deb_account6') <span class="invalid-feedback"
                                                                                   role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-2">
                                                    <select
                                                        class="form-control form-control-sm @error('f_cred_account6') is-invalid @enderror"
                                                        name="f_cred_account6">
                                                        <option value selected>---</option>
                                                        @foreach($accounts as $account)
                                                            <option
                                                                value="{{ $account->f_id }}" {{ selected('f_cred_account6', $account->f_id, $template->f_cred_account6) }}>{{ $account->f_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('f_cred_account6') <span class="invalid-feedback"
                                                                                    role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>@lang('modules/template.title7')</td>
                                            <td>
                                                <div class="mb-2">
                                                    <input type="text"
                                                           class="form-control form-control-sm @error('f_description7') is-invalid @enderror"
                                                           name="f_description7"
                                                           placeholder="@lang('modules/template.description')"
                                                           maxlength="100"
                                                           value="{{ old('f_description7', $template->f_description7)}}">
                                                    @error('f_description7') <span class="invalid-feedback"
                                                                                   role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-2">
                                                    <select
                                                        class="form-control form-control-sm @error('f_deb_account7') is-invalid @enderror"
                                                        name="f_deb_account7">
                                                        <option value selected>---</option>
                                                        @foreach($accounts as $account)
                                                            <option
                                                                value="{{ $account->f_id }}" {{ selected('f_deb_account7', $account->f_id, $template->f_deb_account7) }}>{{ $account->f_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('f_deb_account7') <span class="invalid-feedback"
                                                                                   role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-2">
                                                    <select
                                                        class="form-control form-control-sm @error('f_cred_account7') is-invalid @enderror"
                                                        name="f_cred_account7">
                                                        <option value selected>---</option>
                                                        @foreach($accounts as $account)
                                                            <option
                                                                value="{{ $account->f_id }}" {{ selected('f_cred_account7', $account->f_id, $template->f_cred_account7) }}>{{ $account->f_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('f_cred_account7') <span class="invalid-feedback"
                                                                                    role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>@lang('modules/template.title8')</td>
                                            <td>
                                                <div class="mb-2">
                                                    <input type="text"
                                                           class="form-control form-control-sm @error('f_description8') is-invalid @enderror"
                                                           name="f_description8"
                                                           placeholder="@lang('modules/template.description')"
                                                           maxlength="100"
                                                           value="{{ old('f_description8', $template->f_description8)}}">
                                                    @error('f_description8') <span class="invalid-feedback"
                                                                                   role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-2">
                                                    <select
                                                        class="form-control form-control-sm @error('f_deb_account8') is-invalid @enderror"
                                                        name="f_deb_account8">
                                                        <option value selected>---</option>
                                                        @foreach($accounts as $account)
                                                            <option
                                                                value="{{ $account->f_id }}" {{ selected('f_deb_account8', $account->f_id, $template->f_deb_account8) }}>{{ $account->f_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('f_deb_account8') <span class="invalid-feedback"
                                                                                   role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-2">
                                                    <select
                                                        class="form-control form-control-sm @error('f_cred_account8') is-invalid @enderror"
                                                        name="f_cred_account8">
                                                        <option value selected>---</option>
                                                        @foreach($accounts as $account)
                                                            <option
                                                                value="{{ $account->f_id }}" {{ selected('f_cred_account8', $account->f_id, $template->f_cred_account8) }}>{{ $account->f_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('f_cred_account8') <span class="invalid-feedback"
                                                                                    role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>@lang('modules/template.title9')</td>
                                            <td>
                                                <div class="mb-2">
                                                    <input type="text"
                                                           class="form-control form-control-sm @error('f_description9') is-invalid @enderror"
                                                           name="f_description9"
                                                           placeholder="@lang('modules/template.description')"
                                                           maxlength="100"
                                                           value="{{ old('f_description9', $template->f_description9)}}">
                                                    @error('f_description9') <span class="invalid-feedback"
                                                                                   role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-2">
                                                    <select
                                                        class="form-control form-control-sm @error('f_deb_account9') is-invalid @enderror"
                                                        name="f_deb_account9">
                                                        <option value selected>---</option>
                                                        @foreach($accounts as $account)
                                                            <option
                                                                value="{{ $account->f_id }}" {{ selected('f_deb_account9', $account->f_id, $template->f_deb_account9) }}>{{ $account->f_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('f_deb_account9') <span class="invalid-feedback"
                                                                                   role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-2">
                                                    <select
                                                        class="form-control form-control-sm @error('f_cred_account9') is-invalid @enderror"
                                                        name="f_cred_account9">
                                                        <option value selected>---</option>
                                                        @foreach($accounts as $account)
                                                            <option
                                                                value="{{ $account->f_id }}" {{ selected('f_cred_account9', $account->f_id, $template->f_cred_account9) }}>{{ $account->f_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('f_cred_account9') <span class="invalid-feedback"
                                                                                    role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>@lang('modules/template.title10')</td>
                                            <td>
                                                <div class="mb-2">
                                                    <input type="text"
                                                           class="form-control form-control-sm @error('f_description10') is-invalid @enderror"
                                                           name="f_description10"
                                                           placeholder="@lang('modules/template.description')"
                                                           maxlength="100"
                                                           value="{{ old('f_description10', $template->f_description10)}}">
                                                    @error('f_description10') <span class="invalid-feedback"
                                                                                    role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-2">
                                                    <select
                                                        class="form-control form-control-sm @error('f_deb_account10') is-invalid @enderror"
                                                        name="f_deb_account10">
                                                        <option value selected>---</option>
                                                        @foreach($accounts as $account)
                                                            <option
                                                                value="{{ $account->f_id }}" {{ selected('f_deb_account10', $account->f_id, $template->f_deb_account10) }}>{{ $account->f_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('f_deb_account10') <span class="invalid-feedback"
                                                                                    role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-2">
                                                    <select
                                                        class="form-control form-control-sm @error('f_cred_account10') is-invalid @enderror"
                                                        name="f_cred_account10">
                                                        <option value selected>---</option>
                                                        @foreach($accounts as $account)
                                                            <option
                                                                value="{{ $account->f_id }}" {{ selected('f_cred_account10', $account->f_id, $template->f_cred_account10) }}>{{ $account->f_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('f_cred_account10') <span class="invalid-feedback"
                                                                                     role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>@lang('modules/template.title11')</td>
                                            <td>
                                                <div class="mb-2">
                                                    <input type="text"
                                                           class="form-control form-control-sm @error('f_description11') is-invalid @enderror"
                                                           name="f_description11"
                                                           placeholder="@lang('modules/template.description')"
                                                           maxlength="100"
                                                           value="{{ old('f_description11', $template->f_description11)}}">
                                                    @error('f_description11') <span class="invalid-feedback"
                                                                                    role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-2">
                                                    <select
                                                        class="form-control form-control-sm @error('f_deb_account11') is-invalid @enderror"
                                                        name="f_deb_account11">
                                                        <option value selected>---</option>
                                                        @foreach($accounts as $account)
                                                            <option
                                                                value="{{ $account->f_id }}" {{ selected('f_deb_account11', $account->f_id, $template->f_deb_account11) }}>{{ $account->f_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('f_deb_account11') <span class="invalid-feedback"
                                                                                    role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-2">
                                                    <select
                                                        class="form-control form-control-sm @error('f_cred_account11') is-invalid @enderror"
                                                        name="f_cred_account11">
                                                        <option value selected>---</option>
                                                        @foreach($accounts as $account)
                                                            <option
                                                                value="{{ $account->f_id }}" {{ selected('f_cred_account11', $account->f_id, $template->f_cred_account11) }}>{{ $account->f_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('f_cred_account11') <span class="invalid-feedback"
                                                                                     role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>@lang('modules/template.title12')</td>
                                            <td>
                                                <div class="mb-2">
                                                    <input type="text"
                                                           class="form-control form-control-sm @error('f_description12') is-invalid @enderror"
                                                           name="f_description12"
                                                           placeholder="@lang('modules/template.description')"
                                                           maxlength="100"
                                                           value="{{ old('f_description12', $template->f_description12)}}">
                                                    @error('f_description12') <span class="invalid-feedback"
                                                                                    role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-2">
                                                    <select
                                                        class="form-control form-control-sm @error('f_deb_account12') is-invalid @enderror"
                                                        name="f_deb_account12">
                                                        <option value selected>---</option>
                                                        @foreach($accounts as $account)
                                                            <option
                                                                value="{{ $account->f_id }}" {{ selected('f_deb_account12', $account->f_id, $template->f_deb_account12) }}>{{ $account->f_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('f_deb_account12') <span class="invalid-feedback"
                                                                                    role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-2">
                                                    <select
                                                        class="form-control form-control-sm @error('f_cred_account12') is-invalid @enderror"
                                                        name="f_cred_account12">
                                                        <option value selected>---</option>
                                                        @foreach($accounts as $account)
                                                            <option
                                                                value="{{ $account->f_id }}" {{ selected('f_cred_account12', $account->f_id, $template->f_cred_account12) }}>{{ $account->f_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('f_cred_account12') <span class="invalid-feedback"
                                                                                     role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>@lang('modules/template.title13')</td>
                                            <td>
                                                <div class="mb-2">
                                                    <input type="text"
                                                           class="form-control form-control-sm @error('f_description13') is-invalid @enderror"
                                                           name="f_description13"
                                                           placeholder="@lang('modules/template.description')"
                                                           maxlength="100"
                                                           value="{{ old('f_description13', $template->f_description13)}}">
                                                    @error('f_description13') <span class="invalid-feedback"
                                                                                    role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-2">
                                                    <select
                                                        class="form-control form-control-sm @error('f_deb_account13') is-invalid @enderror"
                                                        name="f_deb_account13">
                                                        <option value selected>---</option>
                                                        @foreach($accounts as $account)
                                                            <option
                                                                value="{{ $account->f_id }}" {{ selected('f_deb_account13', $account->f_id, $template->f_deb_account13) }}>{{ $account->f_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('f_deb_account13') <span class="invalid-feedback"
                                                                                    role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-2">
                                                    <select
                                                        class="form-control form-control-sm @error('f_cred_account13') is-invalid @enderror"
                                                        name="f_cred_account13">
                                                        <option value selected>---</option>
                                                        @foreach($accounts as $account)
                                                            <option
                                                                value="{{ $account->f_id }}" {{ selected('f_cred_account13', $account->f_id, $template->f_cred_account13) }}>{{ $account->f_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('f_cred_account13') <span class="invalid-feedback"
                                                                                     role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>@lang('modules/template.title14')</td>
                                            <td>
                                                <div class="mb-2">
                                                    <input type="text"
                                                           class="form-control form-control-sm @error('f_description14') is-invalid @enderror"
                                                           name="f_description14"
                                                           placeholder="@lang('modules/template.description')"
                                                           maxlength="100"
                                                           value="{{ old('f_description14', $template->f_description14)}}">
                                                    @error('f_description14') <span class="invalid-feedback"
                                                                                    role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-2">
                                                    <select
                                                        class="form-control form-control-sm @error('f_deb_account14') is-invalid @enderror"
                                                        name="f_deb_account14">
                                                        <option value selected>---</option>
                                                        @foreach($accounts as $account)
                                                            <option
                                                                value="{{ $account->f_id }}" {{ selected('f_deb_account14', $account->f_id, $template->f_deb_account14) }}>{{ $account->f_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('f_deb_account14') <span class="invalid-feedback"
                                                                                    role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-2">
                                                    <select
                                                        class="form-control form-control-sm @error('f_cred_account14') is-invalid @enderror"
                                                        name="f_cred_account14">
                                                        <option value selected>---</option>
                                                        @foreach($accounts as $account)
                                                            <option
                                                                value="{{ $account->f_id }}" {{ selected('f_cred_account14', $account->f_id, $template->f_cred_account14) }}>{{ $account->f_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('f_cred_account14') <span class="invalid-feedback"
                                                                                     role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>@lang('modules/template.title15')</td>
                                            <td>
                                                <div class="mb-2">
                                                    <input type="text"
                                                           class="form-control form-control-sm @error('f_description15') is-invalid @enderror"
                                                           name="f_description15"
                                                           placeholder="@lang('modules/template.description')"
                                                           maxlength="100"
                                                           value="{{ old('f_description15', $template->f_description15)}}">
                                                    @error('f_description15') <span class="invalid-feedback"
                                                                                    role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-2">
                                                    <select
                                                        class="form-control form-control-sm @error('f_deb_account15') is-invalid @enderror"
                                                        name="f_deb_account15">
                                                        <option value selected>---</option>
                                                        @foreach($accounts as $account)
                                                            <option
                                                                value="{{ $account->f_id }}" {{ selected('f_deb_account15', $account->f_id, $template->f_deb_account15) }}>{{ $account->f_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('f_deb_account15') <span class="invalid-feedback"
                                                                                    role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-2">
                                                    <select
                                                        class="form-control form-control-sm @error('f_cred_account15') is-invalid @enderror"
                                                        name="f_cred_account15">
                                                        <option value selected>---</option>
                                                        @foreach($accounts as $account)
                                                            <option
                                                                value="{{ $account->f_id }}" {{ selected('f_cred_account15', $account->f_id, $template->f_cred_account15) }}>{{ $account->f_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('f_cred_account15') <span class="invalid-feedback"
                                                                                     role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>@lang('modules/template.title17')</td>
                                            <td>
                                                <div class="mb-2">
                                                    <input type="text"
                                                           class="form-control form-control-sm @error('f_description17') is-invalid @enderror"
                                                           name="f_description17"
                                                           placeholder="@lang('modules/template.description')"
                                                           maxlength="100"
                                                           value="{{ old('f_description17', $template->f_description17)}}">
                                                    @error('f_description17') <span class="invalid-feedback"
                                                                                    role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-2">
                                                    <select
                                                        class="form-control form-control-sm @error('f_deb_account17') is-invalid @enderror"
                                                        name="f_deb_account17">
                                                        <option value selected>---</option>
                                                        @foreach($accounts as $account)
                                                            <option
                                                                value="{{ $account->f_id }}" {{ selected('f_deb_account17', $account->f_id, $template->f_deb_account17) }}>{{ $account->f_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('f_deb_account17') <span class="invalid-feedback"
                                                                                    role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-2">
                                                    <select
                                                        class="form-control form-control-sm @error('f_cred_account17') is-invalid @enderror"
                                                        name="f_cred_account17">
                                                        <option value selected>---</option>
                                                        @foreach($accounts as $account)
                                                            <option
                                                                value="{{ $account->f_id }}" {{ selected('f_cred_account17', $account->f_id, $template->f_cred_account17) }}>{{ $account->f_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('f_cred_account17') <span class="invalid-feedback"
                                                                                     role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>@lang('modules/template.title18')</td>
                                            <td>
                                                <div class="mb-2">
                                                    <input type="text"
                                                           class="form-control form-control-sm @error('f_description18') is-invalid @enderror"
                                                           name="f_description18"
                                                           placeholder="@lang('modules/template.description')"
                                                           maxlength="100"
                                                           value="{{ old('f_description18', $template->f_description18)}}">
                                                    @error('f_description18') <span class="invalid-feedback"
                                                                                    role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-2">
                                                    <select
                                                        class="form-control form-control-sm @error('f_deb_account18') is-invalid @enderror"
                                                        name="f_deb_account18">
                                                        <option value selected>---</option>
                                                        @foreach($accounts as $account)
                                                            <option
                                                                value="{{ $account->f_id }}" {{ selected('f_deb_account18', $account->f_id, $template->f_deb_account18) }}>{{ $account->f_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('f_deb_account18') <span class="invalid-feedback"
                                                                                    role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-2">
                                                    <select
                                                        class="form-control form-control-sm @error('f_cred_account18') is-invalid @enderror"
                                                        name="f_cred_account18">
                                                        <option value selected>---</option>
                                                        @foreach($accounts as $account)
                                                            <option
                                                                value="{{ $account->f_id }}" {{ selected('f_cred_account18', $account->f_id, $template->f_cred_account18) }}>{{ $account->f_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('f_cred_account18') <span class="invalid-feedback"
                                                                                     role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>@lang('modules/template.title19')</td>
                                            <td>
                                                <div class="mb-2">
                                                    <input type="text"
                                                           class="form-control form-control-sm @error('f_description19') is-invalid @enderror"
                                                           name="f_description19"
                                                           placeholder="@lang('modules/template.description')"
                                                           maxlength="100"
                                                           value="{{ old('f_description19', $template->f_description19)}}">
                                                    @error('f_description19') <span class="invalid-feedback"
                                                                                    role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-2">
                                                    <select
                                                        class="form-control form-control-sm @error('f_deb_account19') is-invalid @enderror"
                                                        name="f_deb_account19">
                                                        <option value selected>---</option>
                                                        @foreach($accounts as $account)
                                                            <option
                                                                value="{{ $account->f_id }}" {{ selected('f_deb_account19', $account->f_id, $template->f_deb_account19) }}>{{ $account->f_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('f_deb_account19') <span class="invalid-feedback"
                                                                                    role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-2">
                                                    <select
                                                        class="form-control form-control-sm @error('f_cred_account19') is-invalid @enderror"
                                                        name="f_cred_account19">
                                                        <option value selected>---</option>
                                                        @foreach($accounts as $account)
                                                            <option
                                                                value="{{ $account->f_id }}" {{ selected('f_cred_account19', $account->f_id, $template->f_cred_account19) }}>{{ $account->f_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('f_cred_account19') <span class="invalid-feedback"
                                                                                     role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>@lang('modules/template.title20')</td>
                                            <td>
                                                <div class="mb-2">
                                                    <input type="text"
                                                           class="form-control form-control-sm @error('f_description20') is-invalid @enderror"
                                                           name="f_description20"
                                                           placeholder="@lang('modules/template.description')"
                                                           maxlength="100"
                                                           value="{{ old('f_description20', $template->f_description20)}}">
                                                    @error('f_description20') <span class="invalid-feedback"
                                                                                    role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-2">
                                                    <select
                                                        class="form-control form-control-sm @error('f_deb_account20') is-invalid @enderror"
                                                        name="f_deb_account20">
                                                        <option value selected>---</option>
                                                        @foreach($accounts as $account)
                                                            <option
                                                                value="{{ $account->f_id }}" {{ selected('f_deb_account20', $account->f_id, $template->f_deb_account20) }}>{{ $account->f_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('f_deb_account20') <span class="invalid-feedback"
                                                                                    role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-2">
                                                    <select
                                                        class="form-control form-control-sm @error('f_cred_account20') is-invalid @enderror"
                                                        name="f_cred_account20">
                                                        <option value selected>---</option>
                                                        @foreach($accounts as $account)
                                                            <option
                                                                value="{{ $account->f_id }}" {{ selected('f_cred_account20', $account->f_id, $template->f_cred_account20) }}>{{ $account->f_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('f_cred_account20') <span class="invalid-feedback"
                                                                                     role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>@lang('modules/template.title21')</td>
                                            <td>
                                                <div class="mb-2">
                                                    <input type="text"
                                                           class="form-control form-control-sm @error('f_description21') is-invalid @enderror"
                                                           name="f_description21"
                                                           placeholder="@lang('modules/template.description')"
                                                           maxlength="100"
                                                           value="{{ old('f_description21', $template->f_description21)}}">
                                                    @error('f_description21') <span class="invalid-feedback"
                                                                                    role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-2">
                                                    <select
                                                        class="form-control form-control-sm @error('f_deb_account21') is-invalid @enderror"
                                                        name="f_deb_account21">
                                                        <option value selected>---</option>
                                                        @foreach($accounts as $account)
                                                            <option
                                                                value="{{ $account->f_id }}" {{ selected('f_deb_account21', $account->f_id, $template->f_deb_account21) }}>{{ $account->f_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('f_deb_account21') <span class="invalid-feedback"
                                                                                    role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-2">
                                                    <select
                                                        class="form-control form-control-sm @error('f_cred_account21') is-invalid @enderror"
                                                        name="f_cred_account21">
                                                        <option value selected>---</option>
                                                        @foreach($accounts as $account)
                                                            <option
                                                                value="{{ $account->f_id }}" {{ selected('f_cred_account21', $account->f_id, $template->f_cred_account21) }}>{{ $account->f_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('f_cred_account21') <span class="invalid-feedback"
                                                                                     role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>@lang('modules/template.title22')</td>
                                            <td>
                                                <div class="mb-2">
                                                    <input type="text"
                                                           class="form-control form-control-sm @error('f_description22') is-invalid @enderror"
                                                           name="f_description22"
                                                           placeholder="@lang('modules/template.description')"
                                                           maxlength="100"
                                                           value="{{ old('f_description22', $template->f_description22)}}">
                                                    @error('f_description22') <span class="invalid-feedback"
                                                                                    role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-2">
                                                    <select
                                                        class="form-control form-control-sm @error('f_deb_account22') is-invalid @enderror"
                                                        name="f_deb_account22">
                                                        <option value selected>---</option>
                                                        @foreach($accounts as $account)
                                                            <option
                                                                value="{{ $account->f_id }}" {{ selected('f_deb_account22', $account->f_id, $template->f_deb_account22) }}>{{ $account->f_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('f_deb_account22') <span class="invalid-feedback"
                                                                                    role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-2">
                                                    <select
                                                        class="form-control form-control-sm @error('f_cred_account22') is-invalid @enderror"
                                                        name="f_cred_account22">
                                                        <option value selected>---</option>
                                                        @foreach($accounts as $account)
                                                            <option
                                                                value="{{ $account->f_id }}" {{ selected('f_cred_account22', $account->f_id, $template->f_cred_account22) }}>{{ $account->f_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('f_cred_account22') <span class="invalid-feedback"
                                                                                     role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>@lang('modules/template.title23')</td>
                                            <td>
                                                <div class="mb-2">
                                                    <input type="text"
                                                           class="form-control form-control-sm @error('f_description23') is-invalid @enderror"
                                                           name="f_description23"
                                                           placeholder="@lang('modules/template.description')"
                                                           maxlength="100"
                                                           value="{{ old('f_description23', $template->f_description23)}}">
                                                    @error('f_description23') <span class="invalid-feedback"
                                                                                    role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-2">
                                                    <select
                                                        class="form-control form-control-sm @error('f_deb_account23') is-invalid @enderror"
                                                        name="f_deb_account23">
                                                        <option value selected>---</option>
                                                        @foreach($accounts as $account)
                                                            <option
                                                                value="{{ $account->f_id }}" {{ selected('f_deb_account23', $account->f_id, $template->f_deb_account23) }}>{{ $account->f_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('f_deb_account23') <span class="invalid-feedback"
                                                                                    role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-2">
                                                    <select
                                                        class="form-control form-control-sm @error('f_cred_account23') is-invalid @enderror"
                                                        name="f_cred_account23">
                                                        <option value selected>---</option>
                                                        @foreach($accounts as $account)
                                                            <option
                                                                value="{{ $account->f_id }}" {{ selected('f_cred_account23', $account->f_id, $template->f_cred_account23) }}>{{ $account->f_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('f_cred_account23') <span class="invalid-feedback"
                                                                                     role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="mb-2" hidden>
                            <label class="form-label">@lang('modules/template.f_system1')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_system1') is-invalid @enderror"
                                   name="f_system1"
                                   placeholder="@lang('modules/template.f_system1')"
                                   maxlength="100"
                                   value="{{ old('f_system1') }}">
                            @error('f_system1') <span class="invalid-feedback"
                                                      role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2" hidden>
                            <label class="form-label">@lang('modules/template.f_system2')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_system2') is-invalid @enderror"
                                   name="f_system2"
                                   placeholder="@lang('modules/template.f_system2')"
                                   maxlength="100"
                                   value="{{ old('f_system2') }}">
                            @error('f_system2') <span class="invalid-feedback"
                                                      role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>

                        <div class="mb-2" hidden>
                            <label class="form-label">@lang('modules/template.f_system3')</label>
                            <input type="text"
                                   class="form-control form-control-sm @error('f_system3') is-invalid @enderror"
                                   name="f_system3"
                                   placeholder="@lang('modules/template.f_system3')"
                                   maxlength="100"
                                   value="{{ old('f_system3') }}">
                            @error('f_system3') <span class="invalid-feedback"
                                                      role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
