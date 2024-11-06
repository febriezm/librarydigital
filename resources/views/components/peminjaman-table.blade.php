<x-layout>

  <h2 class="flex justify-center font-bold text-xl mb-8 mt-5">Data Peminjaman Buku</h2>
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
                  <th class="px-4 py-3">Action</th>
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
                  <td class="px-4 py-3 text-sm border">
                      <form action="{{ route('peminjaman.destroy', $item) }}" method="post"
                      class="flex gap-8 mt-2">
                      @method('delete')
                      @csrf
                      <button type="submit" class="text-white px-7 py-2 rounded-md font-semibold">
                        <svg class="text-red-500" height="18px" version="1.1" viewBox="0 0 14 18" width="14px" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" xmlns:xlink="http://www.w3.org/1999/xlink"><title/><desc/><defs/><g fill="none" fill-rule="evenodd" id="Page-1" stroke="none" stroke-width="1"><g fill="#000000" id="Core" transform="translate(-299.000000, -129.000000)"><g id="delete" transform="translate(299.000000, 129.000000)">
                          <path d="M1,16 C1,17.1 1.9,18 3,18 L11,18 C12.1,18 13,17.1 13,16 L13,4 L1,4 L1,16 L1,16 Z M14,1 L10.5,1 L9.5,0 L4.5,0 L3.5,1 L0,1 L0,3 L14,3 L14,1 L14,1 Z" id="Shape"/></g></g></g>
                        </svg>
                      </button>
                      </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

</x-layout>        