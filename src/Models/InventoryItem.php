<?php

declare(strict_types=1);

namespace Dinkassa\Models;

/**
 * Class InventoryItem
 * @see https://eskassa.se/developer/#inventoryitem-fields
 * updated 2021-01-25
 */
class InventoryItem
{
    /** @var array $_Attributes TODO */
    public $_Attributes;

    /** @var string $BarCode Read-Write, max-length: 30, unique, Barcode used by the InventoryItem. If the item doesn't have a bar code; provide another unique value. */
    public $BarCode;

    /** @var string|null $BarCode2 Read-Write, max-length: 30, Extra barcodes used by the InventoryItem. Usually used if an item has more than 1 barcode from different suppliers. */
    public $BarCode2;

    /** @var string|null $BarCode3 Read-Write, max-length: 30, see BarCode2 */
    public $BarCode3;

    /** @var string|null $BarCode4 Read-Write, max-length: 30, see BarCode2 */
    public $BarCode4;

    /** @var string|null $BarCode5 Read-Write, max-length: 30, see BarCode2 */
    public $BarCode5;

    /** @var string|null $BongCategoryId 64-bit, Read-Only, Unique Id-number of the BongCategory for which the item is connected to. For example "Starters". Names & Id's fetched through API/BongCategory. */
    public $BongCategoryId;

    /** @var string $BongCategoryName Read-Only, max-length: 30, The name of the BongCategory for which the InventoryItem is connected to. Used in conjunction with BongCategoryId if necessary. Names & Id's fetched through API/BongCategory. */
    public $BongCategoryName;

    /** @var string $ButtonColorHex Read-Only, The selected color of the button, in hex format.*/
    public $ButtonColorHex;

    /** @var string $CategoryId 64-bit, Read-Write, The ID of the category that the item belongs to. */
    public $CategoryId;

    /** @var string $CategoryName Read-Only, max-length: 30, The name of the category that the item belongs to. */
    public $CategoryName;

    /** @var string $CreatedDateTime Read-Only, DateTime, Datetime-stamp when the InventoryItem was first created, either via API or through the POS. */
    public $CreatedDateTime;

    /** @var string $Description Read-Write, max-length: 30, Name of the InventoryItem (I.e. Pizza Vesuvio) */
    public $Description;

    /** @var int|float $DictionaryTable Read-Only, Words used within the register (Bong info) to present extra text on the kitchen ticket for each InventoryItem ordered. Not visible on customer receipt. */
    public $DictionaryTable;

    /** @var string $ExternalProductCode Read-Write, max-length: 30, Product code used by the item. If the item doesn't have a product code; provide another unique value. */
    public $ExternalProductCode;

    /** @var string[]|int[] $ExtraCategoryIds 64-bit, Read-Only, Id-number of extra categories for which the InventoryItem is connected to. This is not the main category. */
    public $ExtraCategoryIds;

    /** @var string|int|null $Id 64-bit, Read-Only, Unique identification number of each InventoryItem. */
    public $Id;

    /** @var string $LastModifiedDateTime Read-Only, DateTime, Datetime-stamp when the InventoryItem was last modified. Any modification to the InventoryItem results in a DateTime update of LastModifiedDateTime. */
    public $LastModifiedDateTime;

    /** @var int|null Read-Only, undeifed, Only used if an InventoryItem is connected to a MultiPriceList. See section "MultiPriceList". */
    public $MultiPriceListId;

    /** @var float $PickupPriceIncludingVat Read-Write, 0 => disabled, Pickup price (TakeAway) for the item including VAT. */
    public $PickupPriceIncludingVat;

    /** @var float $PriceIncludingVat Read-Write, Price for the InventoryItem including VAT. */
    public $PriceIncludingVat;

    /** @var string|null $ProductCode Read-Write, max-length: 30, unique, Product code used by the item. If the item doesn't have a product code; provide another unique value. */
    public $ProductCode;

    /** @var float|int $QuantityInStockCurrent Read-Write, The number of InventoryItems currently in stock. Can be specified when creating the item. */
    public $QuantityInStockCurrent;

    /** @var int $SortingWeight 32-bit, Read-only, Used to sort InventoryItems in an external system in a vertical order. */
    public $SortingWeight;

    /** @var int|null $SpecialFunctionTypeId 64-bit, Read-only, Number corresponds to a specific "Special Function" within the register. Only required if requested by API Support. */
    public $SpecialFunctionTypeId;

    /** @var string $SupplierName Read-Write, max-length: 30, The name of the supplier. */
    public $SupplierName;

    /** @var float|null $VatPercentage Read-Write, [0, 6, 12, 25], VAT percentage for the InventoryItem. */
    public $VatPercentage;

    /** @var bool $VisibleOnSalesMenu Read-Write, if InventoryItem should be visible on the physical sales menu or not. */
    public $VisibleOnSalesMenu;
}