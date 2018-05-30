import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { AddKeeperComponent } from './add-keeper.component';

describe('AddKeeperComponent', () => {
  let component: AddKeeperComponent;
  let fixture: ComponentFixture<AddKeeperComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AddKeeperComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(AddKeeperComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
