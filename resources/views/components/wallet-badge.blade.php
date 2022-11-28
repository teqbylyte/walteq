@props(['status'])
<span
@class([
      'badge rounded-pill me-1',
      'badge-light-primary' => $status == 'ACTIVE',
      'badge-light-warning' => $status == 'SUSPENDED',
      'badge-light-danger' => $status == 'INACTIVE',
])
>
    {{ $status }}
</span>
