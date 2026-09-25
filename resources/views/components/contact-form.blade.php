@props(['caseType' => null])

<div class="card" style="box-shadow: var(--shadow-xl); border: 1px solid var(--color-border);" id="contact-form">
    <div style="margin-bottom: 1.5rem;">
        <span class="badge badge-red" style="margin-bottom: 0.5rem;">Confidential &amp; Free</span>
        <h3 style="font-size: 1.5rem; font-weight: 800; color: var(--color-primary);">Get Your Free Case Evaluation</h3>
        <p style="font-size: 0.875rem; color: var(--color-text-muted); margin-top: 0.25rem;">
            No fee unless we win. Fill out this form for an immediate callback from Adam L. Shapiro.
        </p>
    </div>

    <form method="POST" action="{{ route('contact.submit') }}" aria-label="Free Consultation Request Form">
        @csrf

        {{-- Anti-Spam Honeypot Field (invisible to users) --}}
        <div style="display:none !important; visibility:hidden; opacity:0; position:absolute; left:-9999px;">
            <label for="website_hp">Leave this empty</label>
            <input type="text" name="website_hp" id="website_hp" autocomplete="off" tabindex="-1">
        </div>

        <div style="display: grid; gap: 1rem;">
            {{-- Name Field --}}
            <div class="form-group" style="margin-bottom: 0;">
                <label for="form-field-name" class="form-label">
                    Full Name <span style="color: var(--color-accent-red);">*</span>
                </label>
                <input type="text" name="name" id="form-field-name" class="form-input @error('name') is-invalid @enderror" placeholder="Your Full Name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            {{-- Phone Number Field --}}
            <div class="form-group" style="margin-bottom: 0;">
                <label for="form-field-phone" class="form-label">
                    Phone Number <span style="color: var(--color-accent-red);">*</span>
                </label>
                <input type="tel" name="phone" id="form-field-phone" class="form-input @error('phone') is-invalid @enderror" placeholder="(970) 742-7476" value="{{ old('phone') }}" required>
                @error('phone')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            {{-- Email Field --}}
            <div class="form-group" style="margin-bottom: 0;">
                <label for="form-field-email" class="form-label">
                    Email Address (Optional)
                </label>
                <input type="email" name="email" id="form-field-email" class="form-input @error('email') is-invalid @enderror" placeholder="your.email@example.com" value="{{ old('email') }}">
                @error('email')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            {{-- Case Type Field --}}
            @if($caseType)
                <input type="hidden" name="case_type" value="{{ $caseType }}">
            @else
            <div class="form-group" style="margin-bottom: 0;">
                <label for="form-field-case-type" class="form-label">
                    Accident / Case Category
                </label>
                <select name="case_type" id="form-field-case-type" class="form-select @error('case_type') is-invalid @enderror">
                    <option value="">Select Accident / Case Type...</option>
                    <option value="Personal Injury" {{ old('case_type') == 'Personal Injury' ? 'selected' : '' }}>Personal Injury</option>
                    <option value="Motor Vehicle Accident" {{ old('case_type') == 'Motor Vehicle Accident' ? 'selected' : '' }}>Motor Vehicle Accident</option>
                    <option value="Slip and Fall" {{ old('case_type') == 'Slip and Fall' ? 'selected' : '' }}>Slip and Fall</option>
                    <option value="Workers' Compensation" {{ old('case_type') == "Workers' Compensation" ? 'selected' : '' }}>Workers' Compensation</option>
                    <option value="Medical Malpractice" {{ old('case_type') == 'Medical Malpractice' ? 'selected' : '' }}>Medical Malpractice</option>
                    <option value="Wrongful Death" {{ old('case_type') == 'Wrongful Death' ? 'selected' : '' }}>Wrongful Death</option>
                    <option value="Construction Accident" {{ old('case_type') == 'Construction Accident' ? 'selected' : '' }}>Construction Accident</option>
                    <option value="E-Bike or Scooter" {{ old('case_type') == 'E-Bike or Scooter' ? 'selected' : '' }}>E-Bike or Scooter</option>
                    <option value="Other Injury" {{ old('case_type') == 'Other Injury' ? 'selected' : '' }}>Other Injury</option>
                </select>
                @error('case_type')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>
            @endif

            {{-- Message Field --}}
            <div class="form-group" style="margin-bottom: 0;">
                <label for="form-field-message" class="form-label">
                    Briefly Describe Your Accident <span style="color: var(--color-accent-red);">*</span>
                </label>
                <textarea name="message" id="form-field-message" rows="4" class="form-textarea @error('message') is-invalid @enderror" placeholder="Describe what happened, injury date, location, and how we can assist..." required>{{ old('message') }}</textarea>
                @error('message')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            {{-- Submit Button --}}
            <div style="margin-top: 0.5rem;">
                <button type="submit" class="btn btn-accent btn-lg" style="width: 100%;">
                    <span>Submit Free Case Review</span>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14m-7-7 7 7-7 7"/></svg>
                </button>
                <div style="text-align: center; margin-top: 0.75rem; font-size: 0.75rem; color: var(--color-text-muted); display: flex; align-items: center; justify-content: center; gap: 0.35rem;">
                    <x-icon name="lock" size="14" />
                    <span>100% Confidential. No attorney-client relationship is formed until a retainer is signed.</span>
                </div>
            </div>
        </div>
    </form>
</div>
