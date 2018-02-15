<!-- Large Size -->
            <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="largeModalLabel">Modal title</h4>
                        </div>
                        <div class="modal-body">
                          <form action="{{url('admin/produk/add')}}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">


                            <label for="nama_kategori">Kategori</label>
                            <div class="form-group">
                              <div class="form-line">
                                <select class="form-control" name="kategori">
                                  @foreach($kategoris as $kategori)
                                    <option value="{{$kategori->id_kategori}}">{{$kategori->nama_kategori}}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>

                            <label for="nama_kategori">Nama Produk</label>
                            <div class="form-group">
                              <div class="form-line">
                                <input type="text" name="nama" class="form-control" placeholder="Nama Produk" value="">
                              </div>
                            </div>

                            <label for="harga">Harga</label>
                            <div class="form-group">
                              <div class="form-line">
                                <input type="text" name="harga" class="form-control" placeholder="Harga" value="">
                              </div>
                            </div>

                            <label for="harga">Deskripsi</label>
                            <div class="form-group">
                              <div class="form-line">
                                <!-- <input type="text" name="desc"   value=""> -->
                                <textarea name="desc" class="form-control no-resize" placeholder="Deskripsi" rows="4" cols="80"></textarea>
                              </div>
                            </div>

                            <label for="gambar">Gambar</label>
                            <div class="form-group">
                              <div class="form-line">
                                <input type="file" name="file" class="form-control" value="">
                              </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="update" class="btn btn-link waves-effect">SAVE CHANGES</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
