<div class="flex justify-center mt-10">
    <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-lg">
        <h2 class="text-2xl font-bold text-center mb-6">
            <?= isset($accesorios) ? 'Editar Accesorio' : 'Agregar Nuevo Accesorio' ?>
        </h2>

        <form action="<?= isset($accesorios) ? 'index.php?route=admin/accesorios/edit/'.$accesorios->id : 'index.php?route=admin/accesorios/create' ?>" 
              method="POST" enctype="multipart/form-data" class="space-y-4">

            <div>
                <label class="block font-medium mb-1">Nombre:</label>
                <input type="text" name="nombre" value="<?= $accesorios->nombre ?? '' ?>" 
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div>
                <label class="block font-medium mb-1">Descripción:</label>
                <textarea name="descripcion" rows="4" 
                          class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required><?= $accesorios->descripcion ?? '' ?></textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium mb-1">Precio:</label>
                    <input type="number" step="0.01" name="precio" value="<?= $accesorios->precio ?? '' ?>" 
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div>
                    <label class="block font-medium mb-1">Stock:</label>
                    <input type="number" name="stock" value="<?= $accesorios->stock ?? 0 ?>" min="0"
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
            </div>

            <div>
                <label class="block font-medium mb-1">Categoría:</label>
                <input type="text" name="categoria" value="<?= $accesorios->categoria ?? 'accesorios' ?>" 
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div>
                <label class="block font-medium mb-1">Imagen:</label>
                <input type="file" name="image" 
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <?php if(isset($accesorios) && $accesorios->imagen_url): ?>
                    <img src="public/assets/img/<?= $accesorios->imagen_url ?>" alt="Imagen" class="mt-2 w-32 h-32 object-cover rounded">
                <?php endif; ?>
            </div>

            <div class="text-center mt-6">
                <button type="submit" 
                        class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition font-medium">
                    <?= isset($accesorios) ? 'Actualizar' : 'Agregar' ?>
                </button>

                 <button type="button"
                        onclick="history.back()"
                        class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition font-medium">
                    Cancelar
                </button>
            </div>

        </form>
    </div>
</div>
