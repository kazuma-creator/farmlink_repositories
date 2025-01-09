@extends('layouts.app')

@section('content')
<div class="ledger-container">
    <h1 class="ledger-title">台帳</h1>

    <div class="ledger-grid">
        <div class="ledger-card">
            <a href="{{ route('ledger.fields.index') }}">
                <svg class="ledger-card-icon" viewBox="0 0 24 24">
                    <path d="M20 3H4a1 1 0 0 0-1 1v16a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zM8 17H6v-2h2v2zm0-4H6v-2h2v2zm0-4H6V7h2v2zm10 8h-8v-2h8v2zm0-4h-8v-2h8v2zm0-4h-8V7h8v2z"/>
                </svg>
                <span class="ledger-card-title">圃場</span>
            </a>
        </div>
        <div class="ledger-card">
            <a href="{{ route('ledger.workers.index') }}">
                <svg class="ledger-card-icon" viewBox="0 0 24 24">
                    <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                </svg>
                <span class="ledger-card-title">作業員</span>
            </a>
        </div>
        <div class="ledger-card">
          <a href="{{ route('ledger.clients.index') }}">
              <svg class="ledger-card-icon" viewBox="0 0 24 24">
                  <path d="M12 7V3H2v18h20V7H12zM6 19H4v-2h2v2zm0-4H4v-2h2v2zm0-4H4V9h2v2zm0-4H4V5h2v2zm4 12H8v-2h2v2zm0-4H8v-2h2v2zm0-4H8V9h2v2zm0-4H8V5h2v2zm10 12h-8v-2h2v-2h-2v-2h2v-2h-2V9h8v10zm-2-8h-2v2h2v-2zm0 4h-2v2h2v-2z"/>
              </svg>
              <span class="ledger-card-title">取引先</span>
          </a>
        </div>
        <div class="ledger-card">
          <a href="{{ route('ledger.items.index') }}">
              <svg class="ledger-card-icon" viewBox="0 0 24 24">
                  <path d="M19 3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zm-8-2h2v-4h4v-2h-4V7h-2v4H7v2h4z"/>
              </svg>
              <span class="ledger-card-title">品目</span>
          </a>
        </div>
        <div class="ledger-card">
          <a href="{{ route('ledger.tasks.index') }}">
              <svg class="ledger-card-icon" viewBox="0 0 24 24">
                  <path d="M19 3h-4.18C14.4 1.84 13.3 1 12 1c-1.3 0-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm2 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
              </svg>
              <span class="ledger-card-title">作業</span>
          </a>
        </div>
        <div class="ledger-card">
          <a href="{{ route('ledger.equipment.index') }}">
              <svg class="ledger-card-icon" viewBox="0 0 24 24">
                  <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
              </svg>
              <span class="ledger-card-title">機械設備</span>
          </a>
        </div>
        <div class="ledger-card">
          <a href="{{ route('ledger.products.index') }}">
              <svg class="ledger-card-icon" viewBox="0 0 24 24">
                  <path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.08-.14.12-.31.12-.48 0-.55-.45-1-1-1H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"/>
              </svg>
              <span class="ledger-card-title">商品</span>
          </a>
        </div>
    </div>
</div>
@endsection

<style>
    .ledger-container {
        font-family: 'Arial', sans-serif;
        background-color: #f0f4f8;
        padding: 2rem;
        max-width: 1200px;
        margin: 0 auto;
    }
    .ledger-title {
        text-align: center;
        color: #333;
        margin-bottom: 2rem;
    }
    .ledger-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
    }
    .ledger-card {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease;
    }
    .ledger-card:hover {
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
    }
    .ledger-card a {
        display: flex;
        align-items: center;
        padding: 1.5rem;
        color: #333;
        text-decoration: none;
    }
    .ledger-card-icon {
        width: 40px;
        height: 40px;
        margin-right: 1rem;
        fill: #4a90e2;
    }
    .ledger-card-title {
        font-size: 1.2rem;
        font-weight: bold;
    }
</style>
