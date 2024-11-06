<x-layout>
  
    <h2 class="flex justify-center font-bold text-2xl mb-8 mt-5">Laporan Data Peminjaman Buku</h2>
    <div class="mt-5 mx-5 overflow-hidden rounded-lg shadow-lg">
      <div class="w-full overflow-x-auto">
        <table class="w-full">
          <thead>
            <tr class="text-md font-semibold tracking-wide text-center text-gray-900 bg-gray-100 border-b border-gray-600">
              <th class="px-2 py-3">No.</th>
              <th class="px-4 py-3">Nama Lengkap</th>
              <th class="px-4 py-3">Buku</th>
              <th class="px-4 py-3">Tanggal Pinjam</th>
              <th class="px-4 py-3">Tanggal Kembali</th>
              <th class="px-4 py-3">Tanggal Dikembalikannya Buku</th>
              <th class="px-4 py-3">Status</th>
              <th class="px-4 py-3">Keterangan</th>
            </tr>
          </thead>
          <tbody class="bg-white">
            @foreach ($peminjaman as $item)
            <tr class="text-gray-700 text-center">
              <td class="px-4 py-3 text-sm border">{{ $loop->iteration }}</td>
              <td class="px-4 py-3 border">
                <div class="text-sm">
                    <p class="font-semibold text-black">{{ $item->user->namalengkap }}</p>
                </div>
              </td>
              <td class="px-4 py-3 text-ms font-semibold border">{{ $item->book->judul }}</td>
              <td class="px-4 py-3 text-sm border">{{ $item->tgl_pinjam }}</td>
              <td class="px-4 py-3 text-sm border">{{ $item->tgl_kembali }}</td>
              <td class="px-4 py-3 text-sm border">{{ $item->tgl_dikembalikan }}</td>
              <td class="px-4 py-3 text-sm border">{{ $item->status }}</td>
              <td class="px-0 py-3 text-xs border">
                <span class="px-4 py-1 font-semibold justify-center leading-tight rounded-sm {{ $item->tgl_dikembalikan == null ? 'bg-white' : ($item->tgl_kembali < $item->tgl_dikembalikan ? 'text-white bg-red-600' : 'text-white bg-green-600') }}">
                 {{ $item->tgl_dikembalikan == null ? 'Not Return' : ($item->tgl_kembali < $item->tgl_dikembalikan ? 'Over deadline' : 'On time') }}</span>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  
  <script type="text/javascript">
      window.print();
      
  </script>
  
  </x-layout>        