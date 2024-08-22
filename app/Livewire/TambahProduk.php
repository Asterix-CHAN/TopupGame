<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Platform;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\TopupgamePackage;
use LivewireUI\Modal\ModalComponent;

class TambahProduk extends ModalComponent
{
    use WithFileUploads;
    public $name;
    public $developer;
    public $description;
    public $about;
    public $price;
    public $stock;
    public $category_id = [];
    public $platform_id;
    public $image;
    protected $rules = [
        'name' => 'required|max:255',
        'developer' => 'required|max:255',
        'description' => 'required|max:255',
        'about' => 'required|max:255',
        'price' => 'required|numeric',
        'stock' => 'required|max:255',
        'category_id' => 'required|array|min:1',
        'category_id.*' => 'required|integer|exists:categories,id',
        'platform_id' => 'required|max:255',
        'image' => 'image|mimes:jpeg,png,jpg|max:2048',
    ];

    public function save(){
        // Validate the input data
        $validatedData = $this->validate();

        // Create a new instance of your model (e.g., Product)
        $product = new TopupgamePackage();
       
        // Assign validated data to the model
        $product->name = $validatedData['name'];
        $product->developer = $validatedData['developer'];
        $product->description = $validatedData['description'];
        $product->about = $validatedData['about'];
        $product->price = $validatedData['price'];
        $product->stock = $validatedData['stock'];
        $product->platform_id = $validatedData['platform_id'];
        $product['slug'] = Str::slug($product->name);

       
         if ($this->image) {
            $imagePath = $this->image->store('assets/gallery', 'public');
            $product->image = $imagePath;
        }

        // Attach categories
        $product->save();
        $product->categories()->sync($this->category_id);
        
        session()->flash('status', 'Post successfully updated.');
 
        $this->closeModal();
        
    }

    public function render()
    {
        $categories = Category::all();
        $platforms = Platform::with(['topup'])->get();
        $items = TopupgamePackage::with(['platform_name'])->get();
       
        return view('livewire.tambah-produk', compact('items', 'categories', 'platforms'));
    }



    
}
