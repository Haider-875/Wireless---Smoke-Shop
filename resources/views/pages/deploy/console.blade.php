<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Production Deployment Console — BUGS Wireless</title>
    <style>
        :root {
            --bg: #0a0a0c;
            --surface: #131318;
            --surface-alt: #1a1a22;
            --border: rgba(255, 255, 255, 0.1);
            --primary: #FFB800;
            --success: #22c55e;
            --danger: #ef4444;
            --warning: #f59e0b;
            --text-main: #ffffff;
            --text-muted: #9ca3af;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background-color: var(--bg);
            color: var(--text-main);
            padding: 30px 16px;
            line-height: 1.6;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
        }
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
            padding-bottom: 16px;
            border-bottom: 1px solid var(--border);
        }
        .brand {
            font-size: 22px;
            font-weight: 800;
            letter-spacing: -0.5px;
        }
        .brand span { color: var(--primary); }
        .tag {
            font-size: 11px;
            text-transform: uppercase;
            font-weight: 700;
            background: rgba(255, 184, 0, 0.15);
            color: var(--primary);
            padding: 4px 10px;
            border-radius: 9999px;
            border: 1px solid rgba(255, 184, 0, 0.3);
        }
        .card {
            background-color: var(--surface);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 24px;
            margin-bottom: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 12px;
            margin-bottom: 20px;
        }
        .stat-item {
            background: var(--surface-alt);
            padding: 14px 18px;
            border-radius: 10px;
            border: 1px solid var(--border);
        }
        .stat-label {
            font-size: 11px;
            color: var(--text-muted);
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 0.05em;
        }
        .stat-val {
            font-size: 20px;
            font-weight: 700;
            color: #fff;
            margin-top: 4px;
        }
        .task-row {
            margin-bottom: 16px;
            background: var(--surface-alt);
            border-radius: 10px;
            padding: 16px;
            border: 1px solid var(--border);
        }
        .task-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 8px;
        }
        .task-title {
            font-size: 14px;
            font-weight: 600;
            color: #fff;
        }
        .status-badge {
            font-size: 10px;
            font-weight: 800;
            padding: 3px 8px;
            border-radius: 4px;
            text-transform: uppercase;
        }
        .status-SUCCESS { background: rgba(34, 197, 94, 0.15); color: var(--success); border: 1px solid rgba(34, 197, 94, 0.3); }
        .status-WARNING { background: rgba(245, 158, 11, 0.15); color: var(--warning); border: 1px solid rgba(245, 158, 11, 0.3); }
        .status-ERROR { background: rgba(239, 68, 68, 0.15); color: var(--danger); border: 1px solid rgba(239, 68, 68, 0.3); }
        .status-SKIPPED { background: rgba(156, 163, 175, 0.15); color: var(--text-muted); border: 1px solid var(--border); }
        pre.console-output {
            background: #000000;
            color: #a3e635;
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", monospace;
            font-size: 12px;
            padding: 12px;
            border-radius: 6px;
            overflow-x: auto;
            max-height: 220px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            white-space: pre-wrap;
            word-break: break-all;
        }
        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 24px;
        }
        .btn {
            display: inline-flex;
            align-items: center;
            padding: 10px 20px;
            font-size: 14px;
            font-weight: 600;
            border-radius: 8px;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.2s;
        }
        .btn-primary {
            background-color: var(--primary);
            color: #000;
            border: 1px solid var(--primary);
        }
        .btn-primary:hover {
            background-color: #e5a700;
        }
        .btn-outline {
            background-color: transparent;
            color: #fff;
            border: 1px solid var(--border);
        }
        .btn-outline:hover {
            border-color: var(--primary);
            background-color: rgba(255, 255, 255, 0.05);
        }
        .creds-box {
            background: rgba(255, 184, 0, 0.08);
            border: 1px solid rgba(255, 184, 0, 0.25);
            border-radius: 10px;
            padding: 16px;
            margin-top: 18px;
        }
        .creds-title {
            font-size: 12px;
            font-weight: 700;
            color: var(--primary);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 6px;
        }
        .creds-content {
            font-size: 13px;
            color: #e5e7eb;
            font-family: monospace;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="brand">BUGS<span>.</span> Deployment Console</div>
            <div class="tag">Production Mode</div>
        </div>

        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-label">Execution Time</div>
                <div class="stat-val">{{ $duration }}s</div>
            </div>
            <div class="stat-item">
                <div class="stat-label">Total Store Products</div>
                <div class="stat-val">{{ $totalProducts }}</div>
            </div>
            <div class="stat-item">
                <div class="stat-label">System Users</div>
                <div class="stat-val">{{ $totalUsers }}</div>
            </div>
            <div class="stat-item">
                <div class="stat-label">Database Status</div>
                <div class="stat-val" style="color: var(--success); font-size: 18px;">Up to Date</div>
            </div>
        </div>

        <div class="card">
            <h3 style="font-size: 16px; margin-bottom: 16px; color: #fff;">Automated Execution Tasks</h3>
            
            @foreach($logs as $log)
                <div class="task-row">
                    <div class="task-header">
                        <span class="task-title">{{ $log['task'] }}</span>
                        <span class="status-badge status-{{ $log['status'] }}">{{ $log['status'] }}</span>
                    </div>
                    @if(!empty(trim($log['output'])))
                        <pre class="console-output">{{ trim($log['output']) }}</pre>
                    @endif
                </div>
            @endforeach

            <div class="creds-box">
                <div class="creds-title">Super Admin Credentials</div>
                <div class="creds-content">
                    Email: <strong>superadmin@bugswireless.com</strong><br>
                    Password: <strong>SuperAdmin@Bugs2026!</strong><br>
                    Role: <strong>super_admin (Full Access)</strong>
                </div>
            </div>

            <div class="actions">
                <a href="{{ route('admin.login') }}" class="btn btn-primary">Go to Admin Login &rarr;</a>
                <a href="{{ route('home') }}" class="btn btn-outline" target="_blank">View Live Store</a>
            </div>
        </div>
    </div>
</body>
</html>

