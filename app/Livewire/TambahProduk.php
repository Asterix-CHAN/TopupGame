<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Platform;
use Illuminate\Support\Str;
use Livewire\Attributes\Url;
use Livewire\WithFileUploads;
use App\Models\TopupgamePackage;
use LivewireUI\Modal\ModalComponent;
use RealRashid\SweetAlert\Facades\Alert;

class TambahProduk extends Component
{
    use WithFileUploads;
    public $name;
    public $developer;
    public $description;
    public $about;
    #[Url()]
    public $category_id = [];
    public $categories;
    public $platform_id;
    public $image;

    public function mount()
    {
        $this->categories = Category::all(); // Memuat data kategori dari database
    }
    protected $rules = [
        'name' => 'required|string|max:255',
        'developer' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'about' => 'required|string|max:255',
       
        'category_id' => 'required|array|min:1',
        'category_id.*' => 'required|integer|exists:categories,id',
        'platform_id' => 'required|integer|max:255',
        'image' => 'file|mimes:png,jpg,pdf|max:2048',
    ];

    public function save(){
        // Validate the input data
        $validatedData = $this->validate();

        // Create a new instance of your model (e.g., Product)
        $product = new TopupgamePackage();
       
        // Assign validated data to the model
        $product->uuid = Str::uuid();
        $product->name = $validatedData['name'];
        $product->developer = $validatedData['developer'];
        $product->description = $validatedData['description'];
        $product->about = $validatedData['about'];
        $product->platform_id = $validatedData['platform_id'];
        $product['slug'] = Str::slug($product->name);

       
         if ($this->image) {
            $imagePath = $this->image->store('assets/gallery', 'public');
            $product->image = $imagePath;
        }

        $existName = TopupgamePackage::where('name', $product['name'])->exists();
        if ($existName) {
            Alert::error('Error', 'Product Name already exists');
            return redirect()->back()->withInput()->with('error', 'Product Name already exists');

        }
        // Attach categories
        $product->save();
        $product->categories()->attach($validatedData['category_id']);

       
        
        Alert::success('Success Title', 'Success Message');

        session()->flash('status', 'successfully');

        
        // $this->closeModal();
        return redirect()->route('game-packages.index');

        
    }

    public function render()
    {
        $categories = Category::all();
        $platforms = Platform::with(['topup'])->get();
        $items = TopupgamePackage::with(['platform_name'])->get();
       
        return view('livewire.tambah-produk', compact('items', 'categories', 'platforms'));
    }



    
}
