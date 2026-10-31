@php $nilai = $nilai ?? null; @endphp
<div class="skala">
    <div class="skala__batang" role="img" aria-label="Skala kelembapan tanah: Kering di bawah 40 persen, Optimal 40 sampai 70 persen, Terlalu Lembap di atas 70 persen">
        <span class="skala__bagian skala__bagian--kering">Kering</span>
        <span class="skala__bagian skala__bagian--optimal">Optimal</span>
        <span class="skala__bagian skala__bagian--lembap">Terlalu Lembap</span>
        <span class="skala__penanda" style="left: {{ $nilai ?? 0 }}%" @if (is_null($nilai)) hidden @endif>
            <span class="skala__nilai">{{ $nilai }}%</span>
        </span>
    </div>
    <div class="skala__sumbu" aria-hidden="true">
        <span>0%</span><span>40%</span><span>70%</span><span>100%</span>
    </div>
</div>
