{{-- =========================================================================
     CASES WE HANDLE (4-Pillar Cross-Practice Matrix from Live Site)
     ========================================================================= --}}
<section class="section section-alt" id="cases-we-handle">
    <div class="container">
        <div class="section-header" style="text-align: center; max-width: 780px; margin: 0 auto 3rem;">
            <span class="badge badge-accent" style="margin-bottom: 0.75rem;">Full-Service Advocacy</span>
            <h2 class="heading-lg" style="margin-bottom: 0.75rem;">Cases We Handle</h2>
            <p style="font-size: 1.05rem; color: var(--color-text-muted);">
                As a full-service personal injury law firm, we represent clients across all major injury categories in New York:
            </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 1.75rem;">
            {{-- Category 1 --}}
            <div class="card" style="background: #ffffff; padding: 2rem 1.75rem; border-radius: var(--radius-lg); border: 1px solid var(--color-border); box-shadow: var(--shadow-sm); display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <div style="width: 48px; height: 48px; border-radius: 12px; background: rgba(37, 99, 235, 0.1); color: #2563eb; display: flex; align-items: center; justify-content: center; margin-bottom: 1.25rem;">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.5 2.8C2.1 10.8 2 11 2 11.2V16c0 .6.4 1 1 1h2"/><circle cx="7" cy="17" r="2"/><circle cx="17" cy="17" r="2"/></svg>
                    </div>
                    <h3 style="font-size: 1.2rem; font-weight: 800; color: var(--color-primary); margin-bottom: 0.75rem; font-family: var(--font-heading);">Vehicle Accidents</h3>
                    <p style="font-size: 0.875rem; line-height: 1.7; color: var(--color-text-muted); margin-bottom: 1.25rem;">
                        Comprehensive representation for car, truck, and motorcycle collisions, bicycle and pedestrian injury claims, and rideshare accidents involving Uber and Lyft.
                    </p>
                </div>
                <a href="{{ route('practice.motor-vehicle') }}" style="font-size: 0.875rem; font-weight: 700; color: #2563eb; text-decoration: none; display: inline-flex; align-items: center; gap: 0.35rem;">
                    <span>View Vehicle Claims &rarr;</span>
                </a>
            </div>

            {{-- Category 2 --}}
            <div class="card" style="background: #ffffff; padding: 2rem 1.75rem; border-radius: var(--radius-lg); border: 1px solid var(--color-border); box-shadow: var(--shadow-sm); display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <div style="width: 48px; height: 48px; border-radius: 12px; background: rgba(214, 40, 40, 0.1); color: #d62828; display: flex; align-items: center; justify-content: center; margin-bottom: 1.25rem;">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M2 20h20"/><path d="m5 10 4-5 4 5"/><path d="m15 10 4 5"/><path d="M9 10v10"/><path d="M15 15v5"/></svg>
                    </div>
                    <h3 style="font-size: 1.2rem; font-weight: 800; color: var(--color-primary); margin-bottom: 0.75rem; font-family: var(--font-heading);">Workplace &amp; Construction Injuries</h3>
                    <p style="font-size: 0.875rem; line-height: 1.7; color: var(--color-text-muted); margin-bottom: 1.25rem;">
                        Aggressive advocacy for workers' compensation claims, job site and construction accidents, and injuries caused by repetitive stress or unsafe working conditions.
                    </p>
                </div>
                <a href="{{ route('practice.construction-accident') }}" style="font-size: 0.875rem; font-weight: 700; color: #d62828; text-decoration: none; display: inline-flex; align-items: center; gap: 0.35rem;">
                    <span>View Construction Claims &rarr;</span>
                </a>
            </div>

            {{-- Category 3 --}}
            <div class="card" style="background: #ffffff; padding: 2rem 1.75rem; border-radius: var(--radius-lg); border: 1px solid var(--color-border); box-shadow: var(--shadow-sm); display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <div style="width: 48px; height: 48px; border-radius: 12px; background: rgba(217, 119, 6, 0.1); color: #d97706; display: flex; align-items: center; justify-content: center; margin-bottom: 1.25rem;">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M3 21h18M5 21V7l8-4v18M13 21V3l6 4v14"/></svg>
                    </div>
                    <h3 style="font-size: 1.2rem; font-weight: 800; color: var(--color-primary); margin-bottom: 0.75rem; font-family: var(--font-heading);">Premises Liability</h3>
                    <p style="font-size: 0.875rem; line-height: 1.7; color: var(--color-text-muted); margin-bottom: 1.25rem;">
                        Relentless pursuit of justice for slip, trip, and fall injuries, hazardous staircases, broken sidewalks, defective buildings, and elevator or escalator accidents.
                    </p>
                </div>
                <a href="{{ route('practice.slip-trip-fall') }}" style="font-size: 0.875rem; font-weight: 700; color: #d97706; text-decoration: none; display: inline-flex; align-items: center; gap: 0.35rem;">
                    <span>View Premises Claims &rarr;</span>
                </a>
            </div>

            {{-- Category 4 --}}
            <div class="card" style="background: #ffffff; padding: 2rem 1.75rem; border-radius: var(--radius-lg); border: 1px solid var(--color-border); box-shadow: var(--shadow-sm); display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <div style="width: 48px; height: 48px; border-radius: 12px; background: rgba(220, 38, 38, 0.1); color: #16a34a; display: flex; align-items: center; justify-content: center; margin-bottom: 1.25rem;">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    </div>
                    <h3 style="font-size: 1.2rem; font-weight: 800; color: var(--color-primary); margin-bottom: 0.75rem; font-family: var(--font-heading);">Catastrophic &amp; Specialized Cases</h3>
                    <p style="font-size: 0.875rem; line-height: 1.7; color: var(--color-text-muted); margin-bottom: 1.25rem;">
                        Compassionate, determined representation for medical malpractice, wrongful death claims, animal attacks, and severe injuries including traumatic brain injuries, spinal cord damage, and burns.
                    </p>
                </div>
                <a href="{{ route('practice.personal-injury') }}" style="font-size: 0.875rem; font-weight: 700; color: #16a34a; text-decoration: none; display: inline-flex; align-items: center; gap: 0.35rem;">
                    <span>View Specialized Claims &rarr;</span>
                </a>
            </div>
        </div>
    </div>
</section>
