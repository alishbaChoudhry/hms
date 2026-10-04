@extends('layouts.app')

@section('title', 'Medical History')

@section('content')

<style>

    /* =========================================================
       MEDICAL HISTORY PAGE
    ========================================================= */

    .medical-history-page {
        color: #1f2937;
    }

    /* =========================================================
       PAGE HEADER
    ========================================================= */

    .medical-history-page .page-title {
        font-size: 28px !important;
        line-height: 1.25;
        font-weight: 700;
        color: #172033;
        margin: 0 0 5px;
    }

    .medical-history-page .page-subtitle {
        font-size: 14px;
        color: #6b7280;
    }

    .medical-history-page .back-btn {
        font-size: 13px;
        font-weight: 500;
        padding: 7px 13px;
        border-radius: 7px;
    }

    /* =========================================================
       COMMON CARD
    ========================================================= */

    .medical-history-page .main-card {
        background: #ffffff;
        border: 1px solid #e5eaf0;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(15, 23, 42, 0.045);
    }

    /* =========================================================
       PATIENT INFORMATION
    ========================================================= */

    .medical-history-page .patient-card {
        padding: 17px 22px;
        margin-bottom: 22px;
    }

    .medical-history-page .patient-avatar {
        width: 46px;
        height: 46px;
        border-radius: 9px;
        background: #eff6ff;
        color: #2563eb;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 20px;
        flex-shrink: 0;
    }

    .medical-history-page .info-label {
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .4px;
        color: #8b95a5;
        margin-bottom: 3px;
    }

    .medical-history-page .info-value {
        font-size: 15px;
        line-height: 1.3;
        font-weight: 700;
        color: #172033;
    }

    .medical-history-page .patient-name {
        font-size: 17px;
        font-weight: 700;
        color: #172033;
    }

    .medical-history-page .patient-divider {
        border-left: 1px solid #e5e7eb;
    }

    /* =========================================================
       HISTORY HEADING
    ========================================================= */

    .medical-history-page .history-heading {
        margin-bottom: 11px;
    }

    .medical-history-page .history-title {
        font-size: 18px !important;
        font-weight: 700;
        color: #172033;
        margin: 0;
    }

    .medical-history-page .history-count {
        background: #eff6ff;
        color: #2563eb;
        border: 1px solid #dbeafe;

        font-size: 12px;
        font-weight: 600;

        padding: 5px 11px;
        border-radius: 20px;
    }

    /* =========================================================
       CHECKUP CARD
    ========================================================= */

    .medical-history-page .checkup-card {
        overflow: hidden;
        margin-bottom: 14px;
    }

    /* =========================================================
       CHECKUP HEADER
    ========================================================= */

    .medical-history-page .checkup-top {
        background: #f8fafc;
        border-bottom: 1px solid #e8edf3;
        padding: 13px 20px;
    }

    .medical-history-page .date-box {
        width: 42px;
        height: 42px;

        border-radius: 8px;
        background: #eff6ff;
        color: #2563eb;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 17px;
        flex-shrink: 0;
    }

    .medical-history-page .visit-date {
        font-size: 15px;
        font-weight: 700;
        color: #172033;
    }

    .medical-history-page .doctor-name {
        font-size: 12px;
        color: #6b7280;
        margin-top: 3px;
    }

    .medical-history-page .follow-label {
        font-size: 10px;
        font-weight: 700;
        color: #8b95a5;
        margin-bottom: 3px;
    }

    .medical-history-page .follow-date {
        display: inline-flex;
        align-items: center;
        gap: 5px;

        background: #ffffff;
        color: #2563eb;
        border: 1px solid #dbe3ee;
        border-radius: 6px;

        padding: 6px 9px;

        font-size: 12px;
        font-weight: 600;
    }

    /* =========================================================
       NEW CHECKUP BODY - LEFT / RIGHT
    ========================================================= */

    .medical-history-page .checkup-body {
        padding: 17px 20px;
    }

    .medical-history-page .checkup-left {
    padding-right: 22px;
    border-right: 1px solid #edf0f4;
}

.medical-history-page .checkup-right {
    padding-left: 22px;
}

.medical-history-page .detail-section {
    margin-bottom: 22px;
}

.medical-history-page .symptoms-section {
    padding-top: 18px;
    border-top: 1px solid #edf0f4;
}

    /* =========================================================
       DETAIL TITLE
    ========================================================= */

    .medical-history-page .detail-title {
        display: flex;
        align-items: center;
        gap: 7px;

        font-size: 12px;
        font-weight: 700;

        color: #687386;

        text-transform: uppercase;
        letter-spacing: .25px;

        margin-bottom: 8px;
    }

    .medical-history-page .detail-title i {
        color: #2563eb;
        font-size: 14px;
    }

    /* =========================================================
       DIAGNOSIS
    ========================================================= */

    .medical-history-page .diagnosis-section {
        margin-top: 22px;
    }

    .medical-history-page .diagnosis-value {
        font-size: 14px;
        line-height: 1.55;
        font-weight: 600;
        color: #273449;
    }

    /* =========================================================
       SYMPTOMS
    ========================================================= */

    .medical-history-page .symptom-badge {
        display: inline-block;

        background: #f8fafc;
        border: 1px solid #e1e7ef;

        color: #374151;

        border-radius: 5px;

        padding: 6px 10px;

        font-size: 13px;
        font-weight: 500;

        margin-right: 4px;
        margin-bottom: 5px;
    }

    /* =========================================================
       MEDICINES
    ========================================================= */

    .medical-history-page .medicine-item {
        padding: 10px 0;
        border-bottom: 1px solid #edf0f4;
    }

    .medical-history-page .medicine-item:first-child {
        padding-top: 0;
    }

    .medical-history-page .medicine-item:last-child {
        border-bottom: 0;
        padding-bottom: 0;
    }

    .medicine-name-row {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 9px;
    }

    .medicine-icon {
        color: #2563eb;
        font-size: 16px;
    }

    .medicine-name {
        font-size: 15px;
        line-height: 1.3;
        font-weight: 700;
        color: #172033;
    }

    /* =========================================================
       MEDICINE DETAILS
    ========================================================= */

    .medical-history-page .medicine-details {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 7px;
    }

    .medical-history-page .medicine-detail {
        background: #f8fafc;
        border: 1px solid #e5e7eb;

        border-radius: 6px;

        padding: 7px 9px;

        min-width: 0;
    }

    .medical-history-page .medicine-detail-label {
        display: block;

        font-size: 10px;
        line-height: 1.2;

        font-weight: 700;

        text-transform: uppercase;
        letter-spacing: .3px;

        color: #8b95a5;

        margin-bottom: 4px;
    }

    .medical-history-page .medicine-detail-value {
        display: block;

        font-size: 13px;
        line-height: 1.35;

        font-weight: 600;

        color: #374151;

        word-break: break-word;
    }

    /* =========================================================
       NOTES
    ========================================================= */

    .medical-history-page .notes-box {
        margin-top: 16px;
        padding-top: 13px;

        border-top: 1px solid #edf0f4;
    }

    .medical-history-page .notes-text {
        font-size: 13px;
        line-height: 1.55;
        color: #4b5563;
    }

    /* =========================================================
       EMPTY TEXT
    ========================================================= */

    .medical-history-page .empty-text {
        font-size: 12px;
        color: #9ca3af;
    }

    /* =========================================================
       EMPTY STATE
    ========================================================= */

    .medical-history-page .empty-card {
        padding: 35px 20px;
        text-align: center;
    }

    .medical-history-page .empty-icon {
        width: 50px;
        height: 50px;

        margin: 0 auto 12px;

        border-radius: 50%;

        background: #f3f4f6;

        display: flex;
        align-items: center;
        justify-content: center;

        color: #9ca3af;
        font-size: 22px;
    }

    .medical-history-page .empty-title {
        font-size: 15px;
        font-weight: 700;
        color: #374151;
        margin-bottom: 4px;
    }

    .medical-history-page .empty-description {
        font-size: 13px;
        color: #9ca3af;
    }

    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 991px) {

        .medical-history-page .patient-divider {
            border-left: 0;
        }

        .medical-history-page .checkup-left {
            padding-right: 0;
            border-right: 0;
            border-bottom: 1px solid #edf0f4;
            padding-bottom: 15px;
            margin-bottom: 15px;
        }

        .medical-history-page .checkup-right {
            padding-left: 0;
        }

    }

    @media (max-width: 767px) {

        .medical-history-page .page-title {
            font-size: 23px !important;
        }

        .medical-history-page .page-subtitle {
            font-size: 13px;
        }

        .medical-history-page .back-btn {
            padding: 6px 9px;
            font-size: 12px;
        }

        .medical-history-page .patient-card {
            padding: 16px;
        }

        .medical-history-page .patient-divider {
            border-left: 0;
            border-top: 1px solid #e5e7eb;

            padding-top: 12px;
            margin-top: 12px;
        }

        .medical-history-page .checkup-top {
            padding: 13px 15px;
        }

        .medical-history-page .checkup-body {
            padding: 15px;
        }

        .medical-history-page .follow-section {
            text-align: left !important;
            margin-top: 10px;
        }

        .medical-history-page .medicine-details {
            grid-template-columns: repeat(3, 1fr);
        }

    }

    @media (max-width: 480px) {

        .medical-history-page .medicine-details {
            grid-template-columns: 1fr;
        }

        .medical-history-page .page-title {
            font-size: 21px !important;
        }

    }

</style>


<div class="medical-history-page">

    <div class="container-fluid py-3">

        {{-- =====================================================
             PAGE HEADER
        ====================================================== --}}

        <div class="d-flex justify-content-between align-items-center mb-3">

            <div>

                <h1 class="page-title">
                    Patient Medical History
                </h1>

                <div class="page-subtitle">
                    Medical visits, diagnosis and treatment history
                </div>

            </div>

            <a href="{{ route('patients') }}"
               class="btn btn-outline-secondary back-btn">

                <i class="bi bi-arrow-left me-1"></i>

                Back to Patients

            </a>

        </div>


        {{-- =====================================================
             PATIENT INFORMATION
        ====================================================== --}}

        <div class="main-card patient-card">

            <div class="row align-items-center">

                {{-- Patient Name --}}

                <div class="col-lg-5 col-md-6 mb-3 mb-lg-0">

                    <div class="d-flex align-items-center">

                        <div class="patient-avatar me-3">

                            <i class="bi bi-person"></i>

                        </div>

                        <div>

                            <div class="info-label">
                                Patient
                            </div>

                            <div class="patient-name">

                                {{ $patient->name }}

                            </div>

                        </div>

                    </div>

                </div>


                {{-- Father Name --}}

                <div class="col-lg-3 col-md-3 patient-divider">

                    <div class="info-label">
                        Father Name
                    </div>

                    <div class="info-value">

                        {{ $patient->father_name ?? 'Not provided' }}

                    </div>

                </div>


                {{-- CNIC --}}

                <div class="col-lg-4 col-md-3 patient-divider">

                    <div class="info-label">
                        CNIC
                    </div>

                    <div class="info-value">

                        {{ $patient->cnic ?? 'Not provided' }}

                    </div>

                </div>

            </div>

        </div>


        {{-- =====================================================
             HISTORY HEADING
        ====================================================== --}}

        <div class="history-heading d-flex justify-content-between align-items-center">

            <div class="d-flex align-items-center">

                <i class="bi bi-clock-history text-primary me-2"
                   style="font-size:18px;"></i>

                <h2 class="history-title">
                    Previous Checkups
                </h2>

            </div>

            <span class="history-count">

                {{ $patient->checkups->count() }}

                {{ $patient->checkups->count() == 1 ? 'Checkup' : 'Checkups' }}

            </span>

        </div>


        {{-- =====================================================
             CHECKUPS
        ====================================================== --}}

        @forelse($patient->checkups->sortByDesc('created_at') as $checkup)

            <div class="main-card checkup-card">

                {{-- =================================================
                     CHECKUP HEADER
                ================================================== --}}

                <div class="checkup-top">

                    <div class="row align-items-center">

                        {{-- Date / Doctor --}}

                        <div class="col-md-6">

                            <div class="d-flex align-items-center">

                                <div class="date-box me-3">

                                    <i class="bi bi-calendar3"></i>

                                </div>

                                <div>

                                    <div class="visit-date">

                                        {{ $checkup->created_at->format('d M Y') }}

                                    </div>

                                    <div class="doctor-name">

                                        <i class="bi bi-person-badge me-1"></i>

                                        Dr. {{ $checkup->doctor->name ?? 'Not provided' }}

                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- Follow Up --}}

                        <div class="col-md-6 follow-section text-md-end mt-3 mt-md-0">

                            @if($checkup->follow_up_date)

                                <div class="follow-label">
                                    FOLLOW-UP
                                </div>

                                <span class="follow-date">

                                    <i class="bi bi-calendar-check"></i>

                                    {{ \Carbon\Carbon::parse($checkup->follow_up_date)->format('d M Y') }}

                                </span>

                            @else

                                <span class="empty-text">
                                    No follow-up scheduled
                                </span>

                            @endif

                        </div>

                    </div>

                </div>


                

                                        {{-- =================================================
     CHECKUP BODY - LEFT / RIGHT
================================================== --}}

<div class="checkup-body">

    <div class="row">

        {{-- =================================================
             LEFT SIDE
             Diagnosis + Symptoms
        ================================================== --}}

        <div class="col-lg-4">

            <div class="checkup-left">

                {{-- Diagnosis --}}

                <div class="detail-section">

                    <div class="detail-title">

                        <i class="bi bi-clipboard2-pulse"></i>

                        Diagnosis

                    </div>

                    @if($checkup->diagnosis)

                        <div class="diagnosis-value">

                            {{ $checkup->diagnosis }}

                        </div>

                    @else

                        <div class="empty-text">
                            No diagnosis provided
                        </div>

                    @endif

                </div>


                {{-- Symptoms --}}

                <div class="symptoms-section">

                    <div class="detail-title">

                        <i class="bi bi-thermometer-half"></i>

                        Symptoms

                    </div>

                    @if($checkup->symptoms->count())

                        <div>

                            @foreach($checkup->symptoms as $symptom)

                                <span class="symptom-badge">

                                    {{ $symptom->name }}

                                </span>

                            @endforeach

                        </div>

                    @else

                        <div class="empty-text">
                            No symptoms recorded
                        </div>

                    @endif

                </div>

            </div>

        </div>


        {{-- =================================================
             RIGHT SIDE
             Medicines + Dosage/Frequency/Duration
        ================================================== --}}

        <div class="col-lg-8">

            <div class="checkup-right">

                <div class="detail-title">

                    <i class="bi bi-capsule"></i>

                    Medicines

                </div>


                @if($checkup->medicines->count())

                    @foreach($checkup->medicines as $medicine)

                        <div class="medicine-item">

                            {{-- Medicine Name --}}

                            <div class="medicine-name-row">

                                <i class="bi bi-capsule-pill medicine-icon"></i>

                                <span class="medicine-name">

                                    {{ $medicine->name }}

                                </span>

                            </div>


                            {{-- Medicine Details --}}

                            <div class="medicine-details">

                                {{-- Dosage --}}

                                <div class="medicine-detail">

                                    <span class="medicine-detail-label">
                                        Dosage
                                    </span>

                                    <span class="medicine-detail-value">

                                        {{ $medicine->pivot->dosage ?? 'N/A' }}

                                    </span>

                                </div>


                                {{-- Frequency --}}

                                <div class="medicine-detail">

                                    <span class="medicine-detail-label">
                                        Frequency
                                    </span>

                                    <span class="medicine-detail-value">

                                        {{ $medicine->pivot->frequency ?? 'N/A' }}

                                    </span>

                                </div>


                                {{-- Duration --}}

                                <div class="medicine-detail">

                                    <span class="medicine-detail-label">
                                        Duration
                                    </span>

                                    <span class="medicine-detail-value">

                                        {{ $medicine->pivot->duration ?? 'N/A' }}

                                    </span>

                                </div>

                            </div>

                        </div>

                    @endforeach

                @else

                    <div class="empty-text">

                        No medicines prescribed

                    </div>

                @endif


                {{-- Doctor Notes --}}

                @if($checkup->notes)

                    <div class="notes-box">

                        <div class="detail-title mb-1">

                            <i class="bi bi-journal-text"></i>

                            Doctor's Notes

                        </div>

                        <div class="notes-text">

                            {{ $checkup->notes }}

                        </div>

                    </div>

                @endif

            </div>

        </div>

    </div>

</div>
        @empty

            {{-- =================================================
                 EMPTY STATE
            ================================================== --}}

            <div class="main-card empty-card">

                <div class="empty-icon">

                    <i class="bi bi-clipboard-x"></i>

                </div>

                <div class="empty-title">

                    No Medical History Found

                </div>

                <div class="empty-description">

                    This patient has no previous checkups.

                </div>

            </div>

        @endforelse

    </div>

</div>

@endsection